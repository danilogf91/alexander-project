<?php

namespace App\Livewire;

use App\Models\Data;
use App\Models\Project;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Asantibanez\LivewireCharts\Models\RadarChartModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TestChart extends Component
{
    public $firstRun = true;

    public $showDataLabels = true;
    public $types = [
        'innovation',
        'efficiency_&_saving',
        'replacement_&_restructuring',
        'quality_&_hygiene',
        'health_&_safety',
        'environment',
        'maintenance',
        'capacity_increase'
    ];

    public $stageColors = [
        'Ejecutado' => '#f6ad55',
        'Por ejecutar' => '#36a2eb',
        'Test' => '#90cdf4',
    ];

    public $colors = [
        'innovation' => '#f6ad55',
        'efficiency_&_saving' => '#fc8181',
        'replacement_&_restructuring' => '#90cdf4',
        'quality_&_hygiene' => '#66DA26',
        'health_&_safety' => '#ffce56',
        'environment' => '#4bc0c0',
        'maintenance' => '#36a2eb',
        'capacity_increase' => '#9966FF',
    ];

    public $budgeted = 0;
    public $booked = 0;
    public $executed = 0;
    public $total = 0;


    public function render()
    {

        $projects = Project::whereIn('investments', $this->types)->get();

        $data = Data::select('general_classification', DB::raw('SUM(global_price) as total'))
            ->groupBy('general_classification')
            ->get();

        $area = Data::select('area', DB::raw('SUM(global_price) as total'))
            ->groupBy('area')
            ->get();

        $chartData = Data::select('general_classification', DB::raw('SUM(real_value) as total'))
            ->groupBy('general_classification')
            ->get();

        $columnChartModel2 =  $data
            ->sortByDesc('total')
            ->reduce(
                function (ColumnChartModel $pieChartModel, $data) {
                    $type = $data->general_classification;
                    $value = $data->total;

                    return $pieChartModel->addColumn($type, round($value, 2), $this->stageColors[$type] ?? '#4bc0c0');
                },
                (new ColumnChartModel())
                    ->addColumn('Total', $this->executed ?? 0, '#4bc0c0')
                    ->setTitle('Investments')
                    ->setAnimated($this->firstRun)
                    ->setLegendVisibility(true)
                    ->withGrid()
                    ->withDataLabels()
                    ->withLegend()
            );

        $columnChartModel = $projects
            ->groupBy('investments')
            ->map(function ($data, $type) {
                return [
                    'type' => $type,
                    'count' => $data->count(),
                ];
            })
            ->sortByDesc('count')
            ->reduce(
                function (ColumnChartModel $columnChartModel, $data) {
                    $type = $data['type'];
                    $value = $data['count'];

                    return $columnChartModel->addColumn($type, $value, $this->colors[$type]);
                },
                (new ColumnChartModel())
                    ->setTitle('# de Projects')
                    ->setAnimated($this->firstRun)
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility(true)
                    ->setColumnWidth(80)
                    ->withGrid()
                    ->setHorizontal(true)
                    ->withDataLabels()
                    ->withLegend()
                    ->setDataLabelsEnabled($this->showDataLabels)
                //     ->setOpacity(0.25)
                //     ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            );

        $pieChartModel = $data
            ->sortByDesc('total')
            ->reduce(
                function (PieChartModel $pieChartModel, $data) {
                    $type = $data->general_classification;
                    $value = $data->total;

                    return $pieChartModel->addSlice($type, round($value, 2), $this->stageColors[$type] ?? '#333');
                },
                (new PieChartModel())
                    ->setTitle('Projects by Investments')
                    ->setAnimated($this->firstRun)
                    ->setLegendVisibility(true)
                    ->withGrid()
                    ->withDataLabels()
                    ->withLegend()
            );

        $radarChartModel = $area
            ->reduce(
                function (RadarChartModel $radarChartModel, $data) use ($area) {
                    return $radarChartModel->addSeries($data->first()->area, $data->area, round($data->total, 2));
                },
                LivewireCharts::radarChartModel()
                    ->setAnimated($this->firstRun)

            );

        return view('livewire.test-chart')
            ->with([
                'columnChartModel' => $columnChartModel,
                'pieChartModel' => $pieChartModel,
                'radarChartModel' => $radarChartModel,
                'columnChartModel2' => $columnChartModel2
            ]);
    }

    public function mount()
    {
        $this->budgeted = round(Data::sum('committed'), 2);
        $this->booked = round(Data::sum('real_value'), 2);
        $this->executed = round(Data::sum('global_price'), 2);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Data extends Model
{
    use HasFactory;
    protected $fillable = [
        'area',
        'project_id',
        'group_1',
        'group_2',
        'description',
        'general_classification',
        'item_type',
        'unit',
        'qty',
        'unit_price',
        'global_price',
        'stage',
        'real_value',
        'committed',
        'percentage',
        'executed_dollars',
        'executed_euros',
        'supplier',
        'code',
        'order_no',
        'input_num',
        'observations',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

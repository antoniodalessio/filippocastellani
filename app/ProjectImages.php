<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class ProjectImages extends Model implements Sortable
{
    use SortableTrait;
    protected $fillable = [
        'uri', 'alt', 'ord'
    ];

    public $sortable = [
        'order_column_name' => 'ord',
        'sort_when_creating' => true,
    ];
}

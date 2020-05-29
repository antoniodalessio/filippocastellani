<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;


use App\ProjectImages;

class Project extends Model implements Sortable{

    use SortableTrait;
    public $sortable = [
        'order_column_name' => 'ord',
        'sort_when_creating' => true,
    ];
    
    public function images()
    {
        return $this->hasMany('App\ProjectImages', 'project_id');
    }
}

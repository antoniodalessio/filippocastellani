<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PageContent;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'template'
    ];

    protected $guarded = array();

    public function contents()
    {
        return $this->hasMany('App\PageContent', 'page_id');
    }

    public function template()
    {
        return $this->belongsTo('App\Template');
    }

    // public function images()
    // {
    //     return $this->hasMany('App\PagesImages', 'page_id');
    // }

    // public function imagesections()
    // {
    //     return $this->hasMany('App\PageSections', 'page_id');
    // }
}

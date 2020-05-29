<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PageContent extends Model
{

	protected $fillable = [
        'lang_id',
        'slug',
        'title', 
        'subtitle',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    public function page()
    {
        return $this->belongsTo('App\Page');
    }

    public function lang()
    {
        return $this->belongsTo('App\Lang');
    }
}

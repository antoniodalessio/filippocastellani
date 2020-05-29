<?php

namespace App\Http\Controllers;

use App\Page;
use App\PageContent;
use App\Settings;
//use App\PagesImages;
use App\Menu;
use App\Project;


class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLocal($lang = "it", $pageName = 'home')
    {
        return $this->getPage($lang, $pageName);
    }

    public function index($pageName = 'home')
    {   
        $lang = env('DEFAULT_LOCALIZATION');
        return $this->getPage($lang, $pageName);
    }

    public function getPage($lang, $pageName) {

        $page = Page::where(["active" => "1"])
                    ->whereHas("contents", function($q) use ($pageName, $lang){
                        $q
                        ->where(['slug' => $pageName])
                        ->whereHas('lang', function($q) use ($lang) {
                            $q->where('name', $lang);
                        });
                    })->get()->first();
            


        if (!isset($page) || $page->active == 0) {
            return abort(404);
        }else{
            $temp = $page->template()->first();
            $template = $temp->template;
            $templateid = $temp->id;
        }

        $page->page_id = $page->id;
        $pageName = $page->name;

        $page = $page->contents()->first();


        if ($templateid == 1) {
            $page->projects = Project::all();
        }
    

        $page->template = $template;
        

        return view($template)->with('page', $page);
    }

}

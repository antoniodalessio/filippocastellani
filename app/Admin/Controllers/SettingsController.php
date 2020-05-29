<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\MessageBag;

use App\Settings;


class SettingsController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('Edit settings');
            $content->body($this->form(1)->edit(1));
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        /*return Admin::content(function (Content $content) use ($id) {
            $content->header('Edit page '.$id);
            $content->body($this->form($id)->edit($id));
        });*/
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        /*return Admin::content(function (Content $content) {
            $content->header('Aggiungi una pagina');
            $content->description('');
            $content->body($this->form());
        });*/
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        /*return Admin::grid(Page::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name();
            $grid->column('template.name');
            $grid->column('active')->display(function($val) {
                return $val == 1 ? "<span style='color: green'>attiva</span>" : "<span style='color: red;'>non attiva</span>";
            });
            $grid->created_at();
            $grid->updated_at();

            $grid->filter(function ($filter) {
                $filter->between('created_at', 'Created Time')->datetime();
            });

        });*/
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($id = null)
    {
        return Admin::form(Settings::class, function (Form $form) use($id) {

            $form->text("site_name");
            $form->url("url");
            $form->ckeditor("company_info");

            $temp = array(
                "dev" => "dev",
                "stage" => "stage",
                "quality" => "quality",
                "produzione" => "prod"
            );

            $form->select('environment', 'Ambiente')->options($temp);

            $form->switch("show_info");
            $form->url("cdn");
            $form->text("analytics_id");
            $form->switch("cdn_enabled");
            $form->switch("html_min");
            $form->switch("cache");

            $form->setAction('/admin/settings/1');

            $form->tools(function (Form\Tools $tools) {

                // Disable back btn.
                $tools->disableBackButton();

                // Disable list btn
                $tools->disableListButton();

            });

            
        });
    }
}

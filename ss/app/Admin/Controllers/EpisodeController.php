<?php

namespace App\Admin\Controllers;

use App\Models\Episode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Film;

class EpisodeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Episode';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Episode());

        $grid->filter(function($filter){
            $filter->like('name', 'Name');
        });

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'));
        $grid->column('film_id', __('Film'))->display(function ($film_id){
            return Film::find($film_id)->name;
        });
        $grid->column('link_1', __('Link 1'));
        $grid->column('link_2', __('Link 2'));
        $grid->column('link_3', __('Link 3'));
        $grid->column('link_4', __('Link 4'));
        $grid->column('thumbnail', __('Thumbnail'));
        $grid->column('description', __('Description'));
        $grid->column('status', __('Status'));
        $grid->column('position', __('Position'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Episode::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('film_id', __('Film'));
        $show->field('link_1', __('Link 1'));
        $show->field('link_2', __('Link 2'));
        $show->field('link_3', __('Link 3'));
        $show->field('link_4', __('Link 4'));
        $show->field('thumbnail', __('Thumbnail'));
        $show->field('description', __('Description'));
        $show->field('status', __('Status'));
        $show->field('position', __('Position'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Episode());

        $form->text('name', __('Name'));
        $form->select('film_id', __('Film'))->options(Film::all()->pluck('name', 'id'));
        $form->text('link_1', __('Link 1'));
        $form->text('link_2', __('Link 2'));
        $form->text('link_3', __('Link 3'));
        $form->text('link_4', __('Link 4'));
        $form->image('thumbnail', __('Thumbnail'));
        $form->text('description', __('Description'));
        $form->number('status', __('Status'))->default(1);
        $form->number('position', __('Position'));

        return $form;
    }
}

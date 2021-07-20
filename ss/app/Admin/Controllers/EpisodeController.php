<?php

namespace App\Admin\Controllers;

use App\Models\Episode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

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

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('film_id', __('Film id'));
        $grid->column('link_1', __('Link 1'));
        $grid->column('link_2', __('Link 2'));
        $grid->column('link_3', __('Link 3'));
        $grid->column('link_4', __('Link 4'));
        $grid->column('thumbnail', __('Thumbnail'));
        $grid->column('description', __('Description'));
        $grid->column('status', __('Status'));
        $grid->column('position', __('Position'));
        $grid->column('created_by', __('Created by'));
        $grid->column('updated_by', __('Updated by'));
        $grid->column('deleted_by', __('Deleted by'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('deleted_at', __('Deleted at'));

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

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('film_id', __('Film id'));
        $show->field('link_1', __('Link 1'));
        $show->field('link_2', __('Link 2'));
        $show->field('link_3', __('Link 3'));
        $show->field('link_4', __('Link 4'));
        $show->field('thumbnail', __('Thumbnail'));
        $show->field('description', __('Description'));
        $show->field('status', __('Status'));
        $show->field('position', __('Position'));
        $show->field('created_by', __('Created by'));
        $show->field('updated_by', __('Updated by'));
        $show->field('deleted_by', __('Deleted by'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

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
        $form->number('film_id', __('Film id'));
        $form->text('link_1', __('Link 1'));
        $form->text('link_2', __('Link 2'));
        $form->text('link_3', __('Link 3'));
        $form->text('link_4', __('Link 4'));
        $form->image('thumbnail', __('Thumbnail'));
        $form->text('description', __('Description'));
        $form->number('status', __('Status'))->default(1);
        $form->number('position', __('Position'));
        $form->text('created_by', __('Created by'));
        $form->text('updated_by', __('Updated by'));
        $form->text('deleted_by', __('Deleted by'));

        return $form;
    }
}

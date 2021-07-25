<?php

namespace App\Admin\Controllers;

use App\Models\Ad;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AdController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Ad';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Ad());

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'));
        $grid->column('image', __('Image'));
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
        $show = new Show(Ad::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('image', __('Image'));
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
        $form = new Form(new Ad());

        $form->text('name', __('Name'));
        $form->image('image', __('Image'));
        $form->number('status', __('Status'))->default(1);
        $form->number('position', __('Position'));

        return $form;
    }
}

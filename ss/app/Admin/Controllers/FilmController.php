<?php

namespace App\Admin\Controllers;

use App\Models\Film;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FilmController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Film';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Film());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('author', __('Author'));
        $grid->column('cast', __('Cast'));
        $grid->column('country', __('Country'));
        $grid->column('category_id', __('Category id'));
        $grid->column('episodes', __('Episodes'));
        $grid->column('description', __('Description'));
        $grid->column('star', __('Star'));
        $grid->column('release_date', __('Release date'));
        $grid->column('type_id', __('Type id'));
        $grid->column('image', __('Image'));
        $grid->column('banner', __('Banner'));
        $grid->column('resolution', __('Resolution'));
        $grid->column('language', __('Language'));
        $grid->column('imdb', __('Imdb'));
        $grid->column('running_time', __('Running time'));
        $grid->column('time_slot', __('Time slot'));
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
        $show = new Show(Film::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('author', __('Author'));
        $show->field('cast', __('Cast'));
        $show->field('country', __('Country'));
        $show->field('category_id', __('Category id'));
        $show->field('episodes', __('Episodes'));
        $show->field('description', __('Description'));
        $show->field('star', __('Star'));
        $show->field('release_date', __('Release date'));
        $show->field('type_id', __('Type id'));
        $show->field('image', __('Image'));
        $show->field('banner', __('Banner'));
        $show->field('resolution', __('Resolution'));
        $show->field('language', __('Language'));
        $show->field('imdb', __('Imdb'));
        $show->field('running_time', __('Running time'));
        $show->field('time_slot', __('Time slot'));
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
        $form = new Form(new Film());

        $form->text('name', __('Name'));
        $form->text('author', __('Author'));
        $form->text('cast', __('Cast'));
        $form->number('country', __('Country'));
        $form->number('category_id', __('Category id'));
        $form->number('episodes', __('Episodes'));
        $form->text('description', __('Description'));
        $form->number('star', __('Star'));
        $form->datetime('release_date', __('Release date'))->default(date('Y-m-d H:i:s'));
        $form->number('type_id', __('Type id'));
        $form->image('image', __('Image'));
        $form->image('banner', __('Banner'));
        $form->text('resolution', __('Resolution'));
        $form->text('language', __('Language'));
        $form->text('imdb', __('Imdb'));
        $form->text('running_time', __('Running time'));
        $form->text('time_slot', __('Time slot'));
        $form->number('status', __('Status'))->default(1);
        $form->number('position', __('Position'));
        $form->text('created_by', __('Created by'));
        $form->text('updated_by', __('Updated by'));
        $form->text('deleted_by', __('Deleted by'));

        return $form;
    }
}

<?php

namespace App\Admin\Controllers;

use App\Models\Film;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Country;
use App\Models\FilmCategory;
use App\Models\Type;

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

        $grid->filter(function($filter){
            $filter->like('name', 'Name');
        });

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'));
        $grid->column('author', __('Author'));
        $grid->column('cast', __('Cast'));
        $grid->column('country_id', __('Country'))->display(function ($country){
            return Country::find($country)->name;
        });
        $grid->column('category_id', __('Film Category'))->display(function ($category_id){
            return FilmCategory::find($category_id)->name;
        });
        $grid->column('total_episodes', __('Episodes'));
        $grid->column('newest_episode', __('Newest Episode'));
        $grid->column('description', __('Description'));
        $grid->column('star', __('Star'));
        $grid->column('release_date', __('Release Date'));
        $grid->column('type_id', __('Type'))->display(function ($type_id){
            return Type::find($type_id)->name;
        });
        $grid->column('image', __('Image'));
        $grid->column('image_mobile', __('Image Mobile'));
        $grid->column('banner', __('Banner'));
        $grid->column('banner_mobile', __('Banner Mobile'));
        $grid->column('resolution', __('Resolution'));
        $grid->column('language', __('Language'));
        $grid->column('imdb', __('ImDb'));
        $grid->column('running_time', __('Running time'));
        $grid->column('time_slot', __('Time slot'));
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
        $show = new Show(Film::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('author', __('Author'));
        $show->field('cast', __('Cast'));
        $show->field('country_id', __('Country'));
        $show->field('category_id', __('Category id'));
        $show->field('total_episodes', __('Total Episodes'));
        $show->field('newest_episode', __('Newest Episode'));
        $show->field('description', __('Description'));
        $show->field('star', __('Star'));
        $show->field('release_date', __('Release date'));
        $show->field('type_id', __('Type id'));
        $show->field('image', __('Image'));
        $show->field('image_mobile', __('Image Mobile'));
        $show->field('banner', __('Banner'));
        $show->field('banner_mobile', __('Banner Mobile'));
        $show->field('resolution', __('Resolution'));
        $show->field('language', __('Language'));
        $show->field('imdb', __('Imdb'));
        $show->field('running_time', __('Running time'));
        $show->field('time_slot', __('Time slot'));
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
        $form = new Form(new Film());

        $form->text('name', __('Name'));
        $form->text('author', __('Author'));
        $form->text('cast', __('Cast'));
        $form->select('country_id', __('Country'))->options(Country::all()->pluck('name', 'id'));
        $form->select('category_id', __('Film Category'))->options(FilmCategory::all()->pluck('name', 'id'));
        $form->text('total_episodes', __('Total Episodes'));
        $form->text('newest_episode', __('Newest Episode'));
        $form->text('description', __('Description'));
        $form->number('star', __('Star'));
        $form->datetime('release_date', __('Release Date'))->default(date('Y-m-d H:i:s'));
        $form->select('type_id', __('Type'))->options(Type::all()->pluck('name', 'id'));
        $form->text('image', __('Image'));
        $form->text('image_mobile', __('Image Mobile'));
        $form->text('banner', __('Banner'));
        $form->text('banner_mobile', __('Banner Mobile'));
        $form->text('resolution', __('Resolution'));
        $form->text('language', __('Language'));
        $form->text('imdb', __('Imdb'));
        $form->text('running_time', __('Running time'));
        $form->text('time_slot', __('Time Slot'));
        $form->number('status', __('Status'))->default(1);
        $form->number('position', __('Position'));

        return $form;
    }
}

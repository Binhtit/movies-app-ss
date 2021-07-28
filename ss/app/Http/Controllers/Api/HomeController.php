<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilmCategory;
use App\Models\Film;
use App\Models\Episode;
use App\Models\Type;
use App\Models\Country;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function getHomePage(){
        $data = [];
        $types = Type::all();

        # Category
        $data['categories'] = FilmCategory::select('id', 'name')->orderBy('id', 'asc')->get();

        # Top 5 newest film
        $top5_newest_films = Film::orderBy('created_at', 'desc')
                                ->select('id', 'name', 'banner', 'star', 'episodes', 'release_date', 'description', 'author', 'type_id')
                                ->take(5)->get();
        foreach ($top5_newest_films as $key => $film){
            foreach ($types as $type){
                if($film->type_id == $type->id){
                    $top5_newest_films[$key]['type_name'] = $type->name;
                }
            }
        }
        $data['top_5_newest_films'] = $top5_newest_films;

        # top 40 newest eps
        $top40_newest_eps = [];
        $newest_eps = Episode::orderBy('created_at', 'desc')
                                    ->select('id', 'name', 'film_id')
                                    ->get();
        $allFilm = Film::all();
        $count1 = 1;
        $count2 = 1;
        foreach ($newest_eps as $key => $ep){
            foreach ($allFilm as $film){
                if($film->id == $ep->film_id && $film->category_id == 1 && $count1 <= 20){
                    $arr1['ep_id'] = $ep->id;
                    $arr1['ep_name'] = $ep->name;
                    $arr1['name'] = $film->name;
                    $arr1['image'] = $film->image;
                    $arr1['star'] = $film->star;
                    $arr1['release_date'] = $film->release_date;
                    $arr1['category_id'] = $film->category_id;
                    $arr1['type_id'] = $film->type_id;
                    array_push($top40_newest_eps, $arr1);
                    $count1++;
                }
                if($film->id == $ep->film_id && $film->category_id == 2 && $count2 <= 20){
                    $arr2['ep_id'] = $ep->id;
                    $arr2['ep_name'] = $ep->name;
                    $arr2['name'] = $film->name;
                    $arr2['image'] = $film->image;
                    $arr2['star'] = $film->star;
                    $arr2['release_date'] = $film->release_date;
                    $arr2['category_id'] = $film->category_id;
                    $arr2['type_id'] = $film->type_id;
                    array_push($top40_newest_eps, $arr2);
                    $count2++;
                }
            }
        }
        $data['top_40_newest_eps'] = $top40_newest_eps;

        # all film
        foreach($allFilm as $key => $film){
            $data['all_film'][$key]['id'] = $film->id;
            $data['all_film'][$key]['name'] = $film->name;
            $data['all_film'][$key]['star'] = $film->star;
            $data['all_film'][$key]['release_date'] = $film->release_date;
            $data['all_film'][$key]['image'] = $film->image;
        }
        
        return $data;
    }

    public function get20NewestFilm(){
        # Top 20 film
        $top20_newest_films = Film::orderBy('created_at', 'desc')->select('name', 'id', 'created_at')->take(20)->get();
        return $top20_newest_films;
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilmCategory;
use App\Models\Film;
use App\Models\Episode;
use App\Models\Type;
use App\Models\Country;
use DateTime;

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

        # top 40 newest films
        $newest_created_at = new DateTime('2021-01-01 00:00:00');
        $top40_newest_films = [];
        $all_eps = Episode::all();

        $top20_film_2Ds = Film::orderBy('created_at', 'desc')
                                ->select('id', 'name', 'image', 'star', 'release_date', 'category_id', 'type_id', 'created_at', 'episodes')
                                ->where('category_id', 1)
                                ->take(20)->get();
        
        foreach($top20_film_2Ds as $film_2D){
            foreach($all_eps as $ep){
                if($ep->film_id == $film_2D->id && $ep->created_at >= $newest_created_at){
                    $arr1['ep_name'] = $ep->position . '/' . $film_2D->episodes;
                    $newest_created_at = $ep->created_at;
                }
            }
            $arr1['film_id'] = $film_2D->id;
            $arr1['name'] = $film_2D->name;
            $arr1['image'] = $film_2D->image;
            $arr1['star'] = $film_2D->star;
            $arr1['release_date'] = $film_2D->release_date;
            $arr1['category_id'] = $film_2D->category_id;
            $arr1['type_id'] = $film_2D->type_id;
            array_push($top40_newest_films, $arr1);
        }
        
        $top20_film_3Ds = Film::orderBy('created_at', 'desc')
                                ->select('id', 'name', 'image', 'star', 'release_date', 'category_id', 'type_id', 'created_at')
                                ->where('category_id', 2)
                                ->take(20)->get();
        foreach($top20_film_3Ds as $film_2D){
            foreach($all_eps as $ep){
                if($ep->film_id == $film_2D->id && $ep->created_at >= $newest_created_at){
                    $arr2['ep_name'] = $ep->position . '/' . $film_2D->episodes;
                }
            }
            $arr2['film_id'] = $film_2D->id;
            $arr2['name'] = $film_2D->name;
            $arr2['image'] = $film_2D->image;
            $arr2['star'] = $film_2D->star;
            $arr2['release_date'] = $film_2D->release_date;
            $arr2['category_id'] = $film_2D->category_id;
            $arr2['type_id'] = $film_2D->type_id;
            array_push($top40_newest_films, $arr2);
        }

        $data['top_40_newest_eps'] = $top40_newest_films;

        # all film
        $allFilm = Film::all();
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

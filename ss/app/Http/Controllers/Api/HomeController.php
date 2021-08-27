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
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function getHomePage(){
        $data = [];
        $types = Type::all();
        $all_eps = Episode::all();

        # Category
        $data['categories'] = FilmCategory::select('id', 'name')->orderBy('id', 'asc')->get();

        # Top 5 newest film
        $top5_newest_films = Film::orderBy('id', 'desc')
                                ->select('id', 'name', 'banner', 'star', 'episodes', 'release_date', 'description', 'author', 'type_id')
                                ->take(5)->get();
        foreach ($top5_newest_films as $key => $film){
            foreach ($types as $type){
                if($film->type_id == $type->id){
                    $top5_newest_films[$key]['type_name'] = $type->name;
                }
            }
        }
        foreach ($top5_newest_films as $key => $film){
            $newest_created_at = new DateTime('2021-01-01 00:00:00');
            foreach($all_eps as $ep){
                if($ep->film_id == $film->id && $ep->created_at >= $newest_created_at){
                    $position = $ep->position;
                    $newest_created_at = $ep->created_at;
                }
            }
            $top5_newest_films[$key]['episodes'] = $position . '/' . $film->episodes;
        }
        $data['top_5_newest_films'] = $top5_newest_films;

        # top 40 newest films
        $top40_newest_films = [];
        $id_film_2Ds = Film::where('category_id', 1)->select('id')->get();
        $all_newest_2D_eps =  Episode::orderBy('id', 'desc')
                                            ->whereIn('film_id', $id_film_2Ds)
                                            ->get();
        $all_films = Film::select('id', 'name', 'image', 'star', 'release_date', 'category_id', 'type_id', 'created_at', 'episodes')
                            ->get();
        $top20_film_2Ds = array();
        $duplicate = false;
        foreach($all_newest_2D_eps as $ep){
            foreach($all_films as $film){
                if($film->id == $ep->film_id && count($top20_film_2Ds) < 20){
                    $duplicate = false;
                    if($top20_film_2Ds){
                        foreach($top20_film_2Ds as $value){
                            if($value->id == $film->id){
                                $duplicate = true;
                            }
                        }
                    }
                    if(!$duplicate) {
                        array_push($top20_film_2Ds, $film);
                    }
                }
            }
        }
        foreach($top20_film_2Ds as $film_2D){
            $newest_created_at = new DateTime('2021-01-01 00:00:00');
            foreach($all_eps as $ep){
                if($ep->film_id == $film_2D->id && $ep->created_at >= $newest_created_at){
                    $arr1['ep_name'] = $ep->position . '/' . $film_2D->episodes;
                    $arr1['order'] = date("Y-m-d H:i:s", strtotime($ep->created_at));
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
        
        $id_film_3Ds = Film::where('category_id', 2)->select('id')->get();
        $all_newest_3D_eps =  Episode::orderBy('id', 'desc')
                                            ->whereIn('film_id', $id_film_3Ds)
                                            ->get();
        $all_films = Film::select('id', 'name', 'image', 'star', 'release_date', 'category_id', 'type_id', 'created_at', 'episodes')
                            ->get();
        $top20_film_3Ds = array();
        $duplicate_3d = false;
        foreach($all_newest_3D_eps as $ep){
            foreach($all_films as $film){
                if($film->id == $ep->film_id && count($top20_film_3Ds) < 20){
                    $duplicate_3d = false;
                    if($top20_film_3Ds){
                        foreach($top20_film_3Ds as $value){
                            if($value->id == $film->id){
                                $duplicate_3d = true;
                            }
                        }
                    }
                    if(!$duplicate_3d) {
                        array_push($top20_film_3Ds, $film);
                    }
                }
            }
        }

        foreach($top20_film_3Ds as $film_3D){
            $newest_created_at = new DateTime('2021-01-01 00:00:00');
            foreach($all_eps as $ep){
                if($ep->film_id == $film_3D->id && $ep->created_at >= $newest_created_at){
                    $arr2['ep_name'] = $ep->position . '/' . $film_3D->episodes;
                    $arr2['order'] = date("Y-m-d H:i:s", strtotime($ep->created_at));
                    $newest_created_at = $ep->created_at;
                }
            }
            $arr2['film_id'] = $film_3D->id;
            $arr2['name'] = $film_3D->name;
            $arr2['image'] = $film_3D->image;
            $arr2['star'] = $film_3D->star;
            $arr2['release_date'] = $film_3D->release_date;
            $arr2['category_id'] = $film_3D->category_id;
            $arr2['type_id'] = $film_3D->type_id;
            array_push($top40_newest_films, $arr2);
        }

        $sorter=array();
        $ret=array();
        reset($top40_newest_films);
        foreach ($top40_newest_films as $ii => $va) {
            $sorter[$ii]=$va["order"];
        }
        rsort($sorter);
        foreach ($sorter as $ii => $va) {
            foreach($top40_newest_films as $key => $val) {
                if($va == $val['order']){
                    $ret[$ii] = $top40_newest_films[$key];
                }
            }
        }
        $top40_newest_films=$ret;

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
        $top20_newest_films = Film::orderBy('id', 'desc')->select('name', 'id', 'created_at')->take(20)->get();
        return $top20_newest_films;
    }
}

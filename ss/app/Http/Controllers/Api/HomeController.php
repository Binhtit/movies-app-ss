<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function getHomePage(){
        $data = [];
        # Category
        $data['categories'] = DB::table('film_categories')->select('id', 'name')->orderBy('id', 'asc')->get();

        # top 5 and top 40 newest films
        $episodes = Episode::orderBy('id', 'desc')
                            ->with(['film' => function ($query) {
                                $query->select('id', 'name', 'image', 'image_mobile', 'banner', 'banner_mobile', 'banner_mobile', 'star', 'release_date', 'category_id', 'type_id', 'newest_episode', 'total_episodes', 'description', 'author', 'type_id')->get();
                            }])
                            ->get();
        $top40_newest_films = [];
        $top5_newest_films = [];
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        foreach ($episodes as $episode) {
            $duplicate = false;
            if($episode->film != null){
                $film_id = $episode->film->id;
                $name = $episode->film->name;
                $image = $episode->film->image;
                $image_mobile = $episode->film->image_mobile;
                $star = $episode->film->star;
                $newest = $episode->film->newest_episode . "/" . $episode->film->total_episodes;
                $release_date = $episode->film->release_date;
                $category_id = $episode->film->category_id;
                $type_id = $episode->film->type_id;

                # check duplicate film
                if($top40_newest_films){
                    foreach ($top40_newest_films as $film){
                        if($film_id == $film['film_id']){
                            $duplicate = true;
                        }
                    }
                }
                if(!$duplicate){
                    if($category_id == 1 && $count1 < 20){ # 20 film 2d
                        $arr1['ep_name'] = $newest;
                        $arr1['film_id'] = $film_id;
                        $arr1['name'] = $name;
                        $arr1['image'] = $image;
                        $arr1['image_mobile'] = $image_mobile;
                        $arr1['star'] = $star;
                        $arr1['release_date'] = $release_date;
                        $arr1['category_id'] = $category_id;
                        $arr1['type_id'] = $type_id;
                        array_push($top40_newest_films, $arr1);
                        $count1++;
                    }
                    else if($category_id == 2 && $count2 < 20){ # 20 film 3d
                        $arr2['ep_name'] = $newest;
                        $arr2['film_id'] = $film_id;
                        $arr2['name'] = $name;
                        $arr2['image'] = $image;
                        $arr2['image_mobile'] = $image_mobile;
                        $arr2['star'] = $star;
                        $arr2['release_date'] = $release_date;
                        $arr2['category_id'] = $category_id;
                        $arr2['type_id'] = $type_id;
                        array_push($top40_newest_films, $arr2);
                        $count2++;
                    }
                    if($count3 < 5){ # 5 film 
                        $arr3['id'] = $film_id;
                        $arr3['name'] = $name;
                        $arr3['banner'] = $episode->film->banner;
                        $arr3['banner_mobile'] = $episode->film->banner_mobile;
                        $arr3['star'] = $star;
                        $arr3['episodes'] = $newest;
                        $arr3['release_date'] = $episode->film->release_date;
                        $arr3['description'] = $episode->film->description;
                        $arr3['author'] = $episode->film->author;
                        $arr3['type_id'] = $type_id;
                        $type = $episode->film->load(['type' => function($q){
                            $q->select('id', 'name')->get();
                        }]);
                        $arr3['type_name'] = $type->type->name;
                        array_push($top5_newest_films, $arr3);
                        $count3++;
                    }
                }
            }
        }
        $data['top_5_newest_films'] = $top5_newest_films;
        $data['top_40_newest_eps'] = $top40_newest_films;

        # all film
        $data['all_film'] = DB::table('films')->select('id', 'name', 'star', 'release_date', 'image', 'image_mobile')->get();
        return $data;
    }

    public function get20NewestFilm(){
        # Top 20 film
        $top20_newest_films = DB::table('films')->orderBy('id', 'desc')->select('name', 'id', 'created_at')->take(20)->get();
        return $top20_newest_films;
    }
}

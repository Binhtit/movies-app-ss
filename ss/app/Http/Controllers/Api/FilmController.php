<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Country;
use App\Models\FilmCategory;
use App\Models\Type;
use DateTime;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  @OA\Get( 
     *      path="api/films",
     *      summary="Get all films", 
     *      tags={"Film"}, 
     *      @OA\Response( 
     *          response=200, 
     *          description="Display a listing of films.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ) 
     *  ) 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Film::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *      path="api/films",
     *      summary="Create new film",
     *      tags={"Film"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="name", 
     *          required=true, 
     *          description="Name of films.", 
     *          @OA\Schema( ref="#/components/schemas/Film/properties/name")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="category_id", 
     *          required=true, 
     *          description="Category", 
     *          @OA\Schema( ref="#/components/schemas/Film/properties/category_id")
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="description", 
     *          required=true, 
     *          description="Description of films.", 
     *          @OA\Schema( ref="#/components/schemas/Film/properties/description")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Film"),
     *      ),
     *      @OA\Response( 
     *          response=200, 
     *          description="Create successfully.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ),
     * )
     */
    public function store(Request $request)
    {
        return Film::create($request->all());        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="api/films/{id}",
     *      summary="Show film's details",
     *      tags={"Film"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( ref="#/components/schemas/Film/properties/id") 
     *      ),
     *      @OA\Response( 
     *          response=200, 
     *          description="Display details of films.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ),
     * )
     */
    public function show(Film $film)
    {
        return $film;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Put(
     *      path="api/films/{id}",
     *      summary="Update film",
     *      tags={"Film"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( ref="#/components/schemas/Film/properties/id") 
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="name", 
     *          required=true, 
     *          description="Name of films.", 
     *          @OA\Schema( ref="#/components/schemas/Film/properties/name")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="description", 
     *          required=true, 
     *          description="Description of films.", 
     *          @OA\Schema( ref="#/components/schemas/Film/properties/description")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Film"),
     *      ),
     *      @OA\Response( 
     *          response=200, 
     *          description="Update successfully.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ),
     * )
     */
    public function update(Request $request, Film $film)
    {
        $film->update($request->all());
        return $film;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Delete(
     *      path="api/films/{id}",
     *      summary="Delete film",
     *      tags={"Film"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( ref="#/components/schemas/Film/properties/id") 
     *      ),
     *      @OA\Response( 
     *          response=200, 
     *          description="Delete successfully.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ),
     * )
     */
    public function destroy(Film $film)
    {
        $film->delete();
    }

    /**
     * Get all episodes of a film by film ID.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *      path="api/films/{id}/episodes",
     *      summary="Get all episodes of a film by film ID - Lấy tất cả tập phim theo id bộ phim.",
     *      tags={"Film"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID of the film - Id của bộ phim.", 
     *          @OA\Schema( ref="#/components/schemas/Film/properties/id") 
     *      ),
     *      @OA\Response( 
     *          response=200, 
     *          description="Display a listing of episodes - Hiển thị danh sách các tập phim.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request - Máy chủ không thể hiểu yêu cầu do cú pháp không hợp lệ", 
     *      ),
     *       @OA\Response( 
     *          response=500, 
     *          description="Server errors - Lỗi phía máy chủ", 
     *      ),
     * )
     */
    public function getAllEpisodeByID(Request $request)
    {
        # eps
        $data['eps'] = Episode::where('film_id', $request->id)
                                ->select('id', 'name', 'film_id', 'link_1', 'link_2', 'link_3', 'link_4')
                                ->get();

        # film details
        $film = Film::where('id', $request->id)
                        ->select('id', 'name', 'author', 'country_id', 'category_id', 'total_episodes', 'description', 
                        'star', 'release_date', 'type_id', 'image', 'image_mobile', 'banner', 'banner_mobile', 'running_time', 'time_slot', 'newest_episode', 'time_slot')
                        ->with('country:id,name', 'category:id,name', 'type:id,name')
                        ->first();
        if($film){
            $film['country_name'] = $film->country->name;
            $film['category_name'] = $film->category->name;
            $film['type_name'] = $film->type->name;
            $film['episodes'] =  $film->newest_episode . '/' . $film->total_episodes;
            $film['time_slot'] = $film->time_slot;
        }
        $data['film'] = $film;

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *      path="api/films/newest/{amount}",
     *      summary="Get new updated film by amount - Lấy các phim mới cập nhật theo số lượng.",
     *      tags={"Film"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="amoumt", 
     *          required=true, 
     *          description="Number of newest film - Số lượng phim muốn lấy.", 
     *      ),
     *      @OA\Response( 
     *          response=200, 
     *          description="Display a listing of films - Hiển thị danh sách các phim mới nhất.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request - Máy chủ không thể hiểu yêu cầu do cú pháp không hợp lệ", 
     *      ),
     *       @OA\Response( 
     *          response=500, 
     *          description="Server errors - Lỗi phía máy chủ", 
     *      ),
     * )
     */
    public function getNewestFilm(Request $request)
    {
        return Episode::orderBy('created_at', 'desc')->take($request->amount)->get();
    }

    public function getDetail(Request $request)
    {
        $film = Film::where('id', $request->id)
                        ->select('id', 'name', 'image', 'image_mobile', 'description', 'banner', 'banner_mobile', 'star', 'total_episodes', 
                        'release_date', 'type_id', 'country_id', 'resolution', 'language', 'imdb', 'newest_episode', 'time_slot')
                        ->with('type', 'country')
                        ->first();
        if($film){
            $film['country_name'] = $film->country->name;
            $film['type_name'] = $film->type->name;
            $film['episodes'] = $film->newest_episode . '/' . $film->total_episodes;
            $film['film_status'] = $film->film_status;
            $film['resolution'] = $film->resolution;
            $film['language'] = $film->language;
            $film['imdb'] = $film->imdb; 
            $film['time_slot'] = $film->time_slot; 
        }
        return $film;
    }

    public function getFilmByQuantity(Request $request){
        $quantity = $request->quantity;
        $skip = 0;
        if($request->skip != 20){
            $skip = ($quantity/20-1)*20;
        }
        $episodes = Episode::orderBy('id', 'desc')
                            ->with(['film' => function ($query) {
                                $query->select('id', 'name', 'image', 'image_mobile', 'banner', 'banner_mobile', 'star', 'release_date', 'category_id', 
                                    'type_id', 'newest_episode', 'total_episodes', 'description', 'author', 'type_id')
                                    ->get();
                            }])
                            ->get();
        if($request->category_id == 1){
            $films = [];
            $count1 = 0;
            foreach($episodes as $key => $episode){
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
                    if($films){
                        foreach ($films as $film){
                            if($film_id == $film['film_id']){
                                $duplicate = true;
                            }
                        }
                    }
                    if(!$duplicate){
                        if($category_id == 1){ # 20 film 2d
                            $arr1['ep_name'] = $newest;
                            $arr1['film_id'] = $film_id;
                            $arr1['name'] = $name;
                            $arr1['image_mobile'] = $image_mobile;
                            $arr1['star'] = $star;
                            $arr1['release_date'] = $release_date;
                            $arr1['category_id'] = $category_id;
                            $arr1['type_id'] = $type_id;
                            array_push($films, $arr1);
                            $count1++;
                        }
                    }
                }
            }
            $result = [];
            if(count($films) > ($quantity - 20)){
                foreach($films as $key => $film){
                    if($film['category_id'] == $request->category_id && $key < $quantity && $key >= $skip){
                        if($request->type == 0){
                            array_push($result, $film);
                        }
                        else{
                            if($film['type_id'] == $request->type_id){
                                array_push($result, $film);
                            }
                        }
                    }
                }
            }
            return $result;
        }
        else if($request->category_id == 2){
            $films = [];
            $count1 = 0;
            foreach($episodes as $key => $episode){
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
                    if($films){
                        foreach ($films as $film){
                            if($film_id == $film['film_id']){
                                $duplicate = true;
                            }
                        }
                    }
                    if(!$duplicate){
                        if($category_id == 2){ # 20 film 2d
                            $arr1['ep_name'] = $newest;
                            $arr1['film_id'] = $film_id;
                            $arr1['name'] = $name;
                            $arr1['image_mobile'] = $image_mobile;
                            $arr1['star'] = $star;
                            $arr1['release_date'] = $release_date;
                            $arr1['category_id'] = $category_id;
                            $arr1['type_id'] = $type_id;
                            array_push($films, $arr1);
                            $count1++;
                        }
                    }
                }
            }
            $result = [];
            if(count($films) > ($quantity - 20)){
                foreach($films as $key => $film){
                    if($film['category_id'] == $request->category_id && $key < $quantity && $key >= $skip){
                        if($request->type == 0){
                            array_push($result, $film);
                        }
                        else{
                            if($film['type_id'] == $request->type_id){
                                array_push($result, $film);
                            }
                        }
                    }
                }
            }
            return $result;
        }
    }
}

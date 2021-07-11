<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Country;
use App\Models\FilmCategory;
use App\Models\Type;

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
        $countries = Country::all();
        $film = Film::where('id', $request->id)
                        ->select('id', 'name', 'author', 'country', 'category_id', 'episodes', 'description', 
                        'star', 'release_date', 'type_id', 'image', 'banner', 'running_time', 'time_slot')
                        ->first();
        $categories = FilmCategory::all();
        $types = Type::all();
        foreach ($countries as $country){
            if($country->id == $film->country){
                $film['country_name'] = $country->name;
            }
        }
        foreach ($categories as $category){
            if($category->id == $film->category_id){
                $film['category_name'] = $category->name;
            }
        }
        foreach ($types as $type){
            if($type->id == $film->type_id){
                $film['type_name'] = $type->name;
            }
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
                        ->select('id', 'name', 'image', 'description', 'banner', 'star', 'episodes', 'release_date', 'type_id', 'country')
                        ->first();
        $countries = Country::all();
        $types = Type::all();
        foreach ($countries as $country){
            if($film->country == $country->id){
                $film['country_name'] = $country->name;
            }
        }
        foreach ($types as $key => $type){
            if($film->type_id == $type->id){
                $film['type_name'] = $type->name;
            }
        }
        $film['film_status'] = '';
        $film['screen_resolution'] = '';
        $film['language'] = '';
        $film['imdb'] = ''; 
        return $film;
    }
}

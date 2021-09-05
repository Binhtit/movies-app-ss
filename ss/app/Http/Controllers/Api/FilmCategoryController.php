<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FilmCategory;
use App\Models\Film;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Type;
use App\Models\Episode;
use DateTime;

class FilmCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     *
     *  @OA\Get( 
     *      path="api/film_categories",
     *      summary="Get all film categories", 
     *      tags={"FilmCategory"}, 
     *      @OA\Response( 
     *          response=200, 
     *          description="Display a listing of film categories.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ) 
     *  ) 
     */
    public function index()
    {
        return FilmCategory::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *      path="api/film_categories",
     *      summary="Create new film category",
     *      tags={"FilmCategory"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="name", 
     *          required=true, 
     *          description="Name of category", 
     *          @OA\Schema( ref="#/components/schemas/FilmCategory/properties/name")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="status", 
     *          required=false, 
     *          description="Status of category.", 
     *          @OA\Schema( ref="#/components/schemas/FilmCategory/properties/status")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/FilmCategory"),
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
        return FilmCategory::create($request->all()); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FilmCategory  $filmCategory
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="api/film_categories/{id}",
     *      summary="Get category by id",
     *      tags={"FilmCategory"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/FilmCategory/properties/id") 
     *      ),
     *      @OA\Response( 
     *          response=200, 
     *          description="Display a listing of films.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ),
     * )
     */
    public function show(FilmCategory $filmCategory)
    {
        return $filmCategory;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FilmCategory  $filmCategory
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *      path="api/film_categories/{id}",
     *      summary="Update category by id.",
     *      tags={"FilmCategory"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/FilmCategory/properties/id") 
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="name", 
     *          required=true, 
     *          description="Name of category", 
     *          @OA\Schema( ref="#/components/schemas/FilmCategory/properties/name")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="status", 
     *          required=false, 
     *          description="Status of category.", 
     *          @OA\Schema( ref="#/components/schemas/FilmCategory/properties/status")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/FilmCategory"),
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
    public function update(Request $request, FilmCategory $filmCategory)
    {
        $filmCategory->update($request->all());
        return $filmCategory;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FilmCategory  $filmCategory
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *      path="api/film_categories/{id}",
     *      summary="Delete film category by id.",
     *      tags={"FilmCategory"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/FilmCategory/properties/id") 
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
    public function destroy(FilmCategory $filmCategory)
    {
        $filmCategory->delete();
    }


    public function getAllFilm(Request $request){
        $films = Film::where('category_id', $request->id)
                    ->orderBy('id', 'desc')
                    ->with(['type' => function ($q){
                        $q->select('id', 'name');
                    }])
                    ->select('id', 'total_episodes', 'newest_episode', 'name', 'star', 'release_date', 'type_id', 'image')
                    ->get();
        $data = [];
        foreach ($films as $film){
            $arr['episodes'] = $film->newest_episode . "/" . $film->total_episodes;
            $arr['type_name'] = $film->type->name;
            $arr['film_id'] = $film->id;
            $arr['name'] = $film->name;
            $arr['star'] = $film->star;
            $arr['release_date'] = $film->release_date;
            $arr['image'] = $film->image;
            array_push($data, $arr);
        } 
        return $data;
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  @OA\Get( 
     *      path="/films",
     *      summary="Get all films", 
     *      tags={"films"}, 
     *      security={{"BearerAuth":{}}}, 
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
     *      path="/films",
     *      summary="Create new film",
     *      description="Create new film",
     *      tags={"films"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="name", 
     *          required=true, 
     *          description="Name of films.", 
     *          @OA\Schema( * type="string") 
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="description", 
     *          required=true, 
     *          description="Description of films.", 
     *          @OA\Schema( * type="string") 
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass film credentials",
     *          @OA\JsonContent(
     *              required={"name","description"},
     *              @OA\Property(property="name", type="string", example="user1@mail.com"),
     *              @OA\Property(property="author", type="string", example="Biên kịch"),
     *              @OA\Property(property="country", type="string", example="Quốc gia"),
     *              @OA\Property(property="category", type="string", example="Chuyên mục"),
     *              @OA\Property(property="episodes", type="string", example="Số tập"),
     *              @OA\Property(property="description", type="string", example="This is description"),
     *              @OA\Property(property="star", type="string", example="Đánh giá"),
     *              @OA\Property(property="date", type="string", example="Ngày ra mắt"),
     *              @OA\Property(property="type", type="string", example="Loại"),
     *              @OA\Property(property="image", type="string", example="Path"),
     *              @OA\Property(property="banner", type="string", example="Path"),
     *              @OA\Property(property="created_by", type="string", example="Ng tạo"),
     *              @OA\Property(property="updated_by", type="string", example="Ng sửa"),
     *              @OA\Property(property="deleted_by", type="string", example="Ng xóa"),
     *              @OA\Property(property="created_at", type="string", example="Ngày tạo"),
     *              @OA\Property(property="update_at", type="string", example="Ngày sửa"),
     *              @OA\Property(property="deleted_at", type="string", example="Ngày xóa"),
     *          ),
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
     *      path="/films/{id}",
     *      summary="Show film's details",
     *      description="Details",
     *      tags={"films"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( * type="int") 
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
     *      path="/films/{id}",
     *      summary="Update film",
     *      description="Update film",
     *      tags={"films"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( * type="int") 
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Enter info",
     *          @OA\JsonContent(
     *              required={"name","description"},
     *              @OA\Property(property="name", type="string", example="user1@mail.com"),
     *              @OA\Property(property="author", type="string", example="Biên kịch"),
     *              @OA\Property(property="country", type="string", example="Quốc gia"),
     *              @OA\Property(property="category", type="string", example="Chuyên mục"),
     *              @OA\Property(property="episodes", type="string", example="Số tập"),
     *              @OA\Property(property="description", type="string", example="This is description"),
     *              @OA\Property(property="star", type="string", example="Đánh giá"),
     *              @OA\Property(property="date", type="string", example="Ngày ra mắt"),
     *              @OA\Property(property="type", type="string", example="Loại"),
     *              @OA\Property(property="image", type="string", example="Path"),
     *              @OA\Property(property="banner", type="string", example="Path"),
     *              @OA\Property(property="created_by", type="string", example="Ng tạo"),
     *              @OA\Property(property="updated_by", type="string", example="Ng sửa"),
     *              @OA\Property(property="deleted_by", type="string", example="Ng xóa"),
     *              @OA\Property(property="created_at", type="string", example="Ngày tạo"),
     *              @OA\Property(property="update_at", type="string", example="Ngày sửa"),
     *              @OA\Property(property="deleted_at", type="string", example="Ngày xóa"),
     *          ),
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
     *      path="/films/{id}",
     *      summary="Delete film",
     *      description="Delete",
     *      tags={"films"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( * type="int") 
     *      ),
     *      @OA\Response( 
     *          response=200, 
     *          description="Delete successfully", 
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
}

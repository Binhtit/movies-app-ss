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
     *      tags={"Film"}, 
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
     *      tags={"Film"},
     *      @OA\Parameter( 
     *          in="query", 
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
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Film"),
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
     *      tags={"Film"},
     *      @OA\Parameter( 
     *          in="query", 
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
     *      path="/films/{id}",
     *      summary="Update film",
     *      description="Update film",
     *      tags={"Film"},
     *      @OA\Parameter( 
     *          in="query", 
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
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Film"),
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
     *      tags={"Film"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( ref="#/components/schemas/Film/properties/id") 
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

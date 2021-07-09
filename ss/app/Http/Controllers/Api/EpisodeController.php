<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     *
     *  @OA\Get( 
     *      path="api/episodes",
     *      summary="Get list of episodes.", 
     *      tags={"Episode"}, 
     *      @OA\Response( 
     *          response=200, 
     *          description="Display a listing of episodes.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ) 
     *  ) 
     */
    public function index()
    {
        Episode::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *      path="api/episodes",
     *      summary="Create new episode.",
     *      tags={"Episode"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="name", 
     *          required=true, 
     *          description="Name of episode", 
     *          @OA\Schema( ref="#/components/schemas/Episode/properties/name")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="link", 
     *          required=true, 
     *          description="Link of ep.", 
     *          @OA\Schema( ref="#/components/schemas/Episode/properties/link")
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="film_id", 
     *          required=true, 
     *          description="Film id of ep.", 
     *          @OA\Schema( ref="#/components/schemas/Episode/properties/film_id")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Episode"),
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
        return Episode::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="api/episodes/{id}",
     *      summary="Get episode by id",
     *      tags={"Episode"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Episode/properties/id") 
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
    public function show(Episode $episode)
    {
        return $episode;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *      path="api/episodes/{id}",
     *      summary="Update episode by id.",
     *      tags={"Episode"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Episode/properties/id") 
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="name", 
     *          required=true, 
     *          description="Name of episode", 
     *          @OA\Schema( ref="#/components/schemas/Episode/properties/name")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="link", 
     *          required=true, 
     *          description="Link of episode.", 
     *          @OA\Schema( ref="#/components/schemas/Episode/properties/link")
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="film_id", 
     *          required=true, 
     *          description="Film id of episode.", 
     *          @OA\Schema( ref="#/components/schemas/Episode/properties/film_id")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Episode"),
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
    public function update(Request $request, Episode $episode)
    {
        $episode->update($request->all());
        return $episode;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *      path="api/episodes/{id}",
     *      summary="Delete episode by id.",
     *      tags={"Episode"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Episode/properties/id") 
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
    public function destroy(Episode $episode)
    {
        $episode->delete();
    }

    public function getDetailEp(Request $request){
        return Episode::orderBy('created_at', 'desc')->where('id', $request->id)->get();
    }
}

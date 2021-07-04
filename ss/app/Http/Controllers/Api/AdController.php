<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     *
     *  @OA\Get( 
     *      path="api/ads",
     *      summary="Get list of ads.", 
     *      tags={"Ad"}, 
     *      @OA\Response( 
     *          response=200, 
     *          description="Display a listing of ads.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ) 
     *  ) 
     */
    public function index()
    {
        Ad::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *      path="api/ads",
     *      summary="Create new ad.",
     *      tags={"Ad"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="name", 
     *          required=true, 
     *          description="Name of ad", 
     *          @OA\Schema( ref="#/components/schemas/Ad/properties/name")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="image", 
     *          required=true, 
     *          description="Image of ad.", 
     *          @OA\Schema( ref="#/components/schemas/Ad/properties/image")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Ad"),
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
        return Ad::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="api/ads/{id}",
     *      summary="Get ad by id",
     *      tags={"Ad"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Ad/properties/id") 
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
    public function show(Ad $ad)
    {
        return $ad;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *      path="api/ads/{id}",
     *      summary="Update ad by id.",
     *      tags={"Ad"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Ad/properties/id") 
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="name", 
     *          required=true, 
     *          description="Name of ad", 
     *          @OA\Schema( ref="#/components/schemas/Ad/properties/name")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="image", 
     *          required=true, 
     *          description="Image of ad.", 
     *          @OA\Schema( ref="#/components/schemas/Ad/properties/image")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Ad"),
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
    public function update(Request $request, Ad $ad)
    {
        $ad->update($request->all());
        return $ad;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *      path="api/ads/{id}",
     *      summary="Delete ad by id.",
     *      tags={"Ad"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Ad/properties/id") 
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
    public function destroy(Ad $ad)
    {
        $ad->delete();
    }
}

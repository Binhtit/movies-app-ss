<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
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
     *      path="api/banners",
     *      summary="Get list of banners.", 
     *      tags={"Banner"}, 
     *      @OA\Response( 
     *          response=200, 
     *          description="Display a listing of banners.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ) 
     *  ) 
     */
    public function index()
    {
        Banner::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *      path="api/banners",
     *      summary="Create new banner.",
     *      tags={"Banner"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="name", 
     *          required=true, 
     *          description="Name of banner", 
     *          @OA\Schema( ref="#/components/schemas/Banner/properties/name")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="image", 
     *          required=true, 
     *          description="Path of image.", 
     *          @OA\Schema( ref="#/components/schemas/Banner/properties/image")
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="banner_category", 
     *          required=false, 
     *          description="Category.", 
     *          @OA\Schema( ref="#/components/schemas/Banner/properties/banner_category")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Banner"),
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
        return Banner::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="api/banners/{id}",
     *      summary="Get banner by id",
     *      tags={"Banner"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Banner/properties/id") 
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
    public function show(Banner $banner)
    {
        return $banner;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *      path="api/banners/{id}",
     *      summary="Update banner by id.",
     *      tags={"Banner"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Banner/properties/id") 
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="name", 
     *          required=true, 
     *          description="Name of banner", 
     *          @OA\Schema( ref="#/components/schemas/Banner/properties/name")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="image", 
     *          required=true, 
     *          description="Link of banner.", 
     *          @OA\Schema( ref="#/components/schemas/Banner/properties/image")
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="banner_category", 
     *          required=false, 
     *          description="Category.", 
     *          @OA\Schema( ref="#/components/schemas/Banner/properties/banner_category")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Banner"),
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
    public function update(Request $request, Banner $banner)
    {
        $banner->update($request->all());
        return $banner;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *      path="api/banners/{id}",
     *      summary="Delete banner by id.",
     *      tags={"Banner"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Banner/properties/id") 
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
    public function destroy(Banner $banner)
    {
        $banner->delete();
    }
}

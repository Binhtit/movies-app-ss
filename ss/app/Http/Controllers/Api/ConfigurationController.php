<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
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
     *      path="api/configurations",
     *      summary="Get list of configurations.", 
     *      tags={"Configuration"}, 
     *      @OA\Response( 
     *          response=200, 
     *          description="Display a listing of configurations.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ) 
     *  ) 
     */
    public function index()
    {
        Configuration::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *      path="api/configurations",
     *      summary="Create new configuration.",
     *      tags={"Configuration"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="domain", 
     *          required=true, 
     *          description="Status of category.", 
     *          @OA\Schema( ref="#/components/schemas/Configuration/properties/domain")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Configuration"),
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
        return Configuration::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="api/configurations/{id}",
     *      summary="Get configuration by id",
     *      tags={"Configuration"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Configuration/properties/id") 
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
    public function show(Configuration $configuration)
    {
        return $configuration;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *      path="api/configurations/{id}",
     *      summary="Update configuration by id.",
     *      tags={"Configuration"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Configuration/properties/id") 
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="domain", 
     *          required=true, 
     *          description="Domain.", 
     *          @OA\Schema( ref="#/components/schemas/Configuration/properties/domain")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Configuration"),
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
    public function update(Request $request, Configuration $configuration)
    {
        $configuration->update($request->all());
        return $configuration;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *      path="api/configurations/{id}",
     *      summary="Delete configuration by id.",
     *      tags={"Configuration"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Configuration/properties/id") 
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
    public function destroy(Configuration $configuration)
    {
        $configuration->delete();
    }
}

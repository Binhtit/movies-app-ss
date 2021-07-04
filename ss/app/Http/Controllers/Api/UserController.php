<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
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
     *      path="api/users",
     *      summary="Get list of users.", 
     *      tags={"User"}, 
     *      @OA\Response( 
     *          response=200, 
     *          description="Display a listing of users.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ) 
     *  ) 
     */
    public function index()
    {
        User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *      path="api/users",
     *      summary="Create new user.",
     *      tags={"User"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="name", 
     *          required=true, 
     *          description="Name of user", 
     *          @OA\Schema( ref="#/components/schemas/User/properties/name")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="email", 
     *          required=true, 
     *          description="Email of category.", 
     *          @OA\Schema( ref="#/components/schemas/User/properties/email")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/User"),
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
        return User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="api/users/{id}",
     *      summary="Get user by id",
     *      tags={"User"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/User/properties/id") 
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
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *      path="api/users/{id}",
     *      summary="Update user by id.",
     *      tags={"User"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/User/properties/id") 
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="name", 
     *          required=true, 
     *          description="Name of user", 
     *          @OA\Schema( ref="#/components/schemas/User/properties/name")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="email", 
     *          required=true, 
     *          description="Email of user.", 
     *          @OA\Schema( ref="#/components/schemas/User/properties/email")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/User"),
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
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *      path="api/users/{id}",
     *      summary="Delete user by id.",
     *      tags={"User"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/User/properties/id") 
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
    public function destroy(User $user)
    {
        $user->delete();
    }
}

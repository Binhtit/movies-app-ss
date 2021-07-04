<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
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
     *      path="api/password_resets",
     *      summary="Get list of password resets.", 
     *      tags={"PasswordReset"}, 
     *      @OA\Response( 
     *          response=200, 
     *          description="Display a listing of password_resets.", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ) 
     *  ) 
     */
    public function index()
    {
        PasswordReset::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *      path="api/password_resets",
     *      summary="Create new password_reset.",
     *      tags={"PasswordReset"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="email", 
     *          required=true, 
     *          description="Email of password_reset", 
     *          @OA\Schema( ref="#/components/schemas/PasswordReset/properties/email")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="token", 
     *          required=false, 
     *          description="Status of category.", 
     *          @OA\Schema( ref="#/components/schemas/PasswordReset/properties/token")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/PasswordReset"),
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
        return PasswordReset::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PasswordReset  $password_reset
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="api/password_resets/{id}",
     *      summary="Get password_reset by id",
     *      tags={"PasswordReset"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/PasswordReset/properties/id") 
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
    public function show(PasswordReset $password_reset)
    {
        return $password_reset;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PasswordReset  $password_reset
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *      path="api/password_resets/{id}",
     *      summary="Update password_reset by id.",
     *      tags={"PasswordReset"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/PasswordReset/properties/id") 
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="email", 
     *          required=true, 
     *          description="Email of password_reset", 
     *          @OA\Schema( ref="#/components/schemas/PasswordReset/properties/email")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="token", 
     *          required=false, 
     *          description="Status of password_reset.", 
     *          @OA\Schema( ref="#/components/schemas/PasswordReset/properties/token")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/PasswordReset"),
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
    public function update(Request $request, PasswordReset $password_reset)
    {
        $password_reset->update($request->all());
        return $password_reset;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PasswordReset  $password_reset
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *      path="api/password_resets/{id}",
     *      summary="Delete password_reset by id.",
     *      tags={"PasswordReset"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/PasswordReset/properties/id") 
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
    public function destroy(PasswordReset $password_reset)
    {
        $password_reset->delete();
    }
}

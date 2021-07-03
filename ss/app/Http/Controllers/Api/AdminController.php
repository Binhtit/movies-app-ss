<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
     *  @OA\Get( 
     *      path="/admin/dashboard",
     *      summary="Sign in", 
     *      description="Login by email, password",
     *      tags={"auth"}, 
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="email", 
     *          required=true, 
     *          description="Email", 
     *          @OA\Schema( * type="email") 
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="password", 
     *          required=true, 
     *          description="Password", 
     *          @OA\Schema( * type="password") 
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass film credentials",
     *          @OA\JsonContent(
     *              required={"email","password"},
     *              @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *              @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
     *          ),
     *      ), 
     *      @OA\Response( 
     *          response=200, 
     *          description="Display list of admin", 
     *      ), 
     *      @OA\Response( 
     *          response=400, 
     *          description="Bad Request", 
     *      ) 
     *  ) 
     */
    public function index()
    {
        Admin::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}

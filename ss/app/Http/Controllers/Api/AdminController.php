<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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
     *      path="api/admins",
     *      summary="Get list of admins.", 
     *      tags={"Admin"}, 
     *      @OA\Response( 
     *          response=200, 
     *          description="Display a listing of admins.", 
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
    /**
     * @OA\Post(
     *      path="api/admins",
     *      summary="Create new admin.",
     *      tags={"Admin"},
     *      @OA\Parameter( 
     *          in="query", 
     *          name="admin_email", 
     *          required=true, 
     *          description="Name of admin", 
     *          @OA\Schema( ref="#/components/schemas/Admin/properties/admin_email")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="admin_password", 
     *          required=true, 
     *          description="Pw of admin.", 
     *          @OA\Schema( ref="#/components/schemas/Admin/properties/admin_password")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Admin"),
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
        return Admin::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="api/admins/{id}",
     *      summary="Get admin by id",
     *      tags={"Admin"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Admin/properties/id") 
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
    public function show(Admin $admin)
    {
        return $admin;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *      path="api/admins/{id}",
     *      summary="Update admin by id.",
     *      tags={"Admin"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Admin/properties/id") 
     *      ),
     *      @OA\Parameter( 
     *          in="query", 
     *          name="admin_email", 
     *          required=true, 
     *          description="Name of admin", 
     *          @OA\Schema( ref="#/components/schemas/Admin/properties/admin_email")
     *      ), 
     *      @OA\Parameter( 
     *          in="query", 
     *          name="admin_password", 
     *          required=false, 
     *          description="Pw of admin.", 
     *          @OA\Schema( ref="#/components/schemas/Admin/properties/admin_password")
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Admin"),
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
    public function update(Request $request, Admin $admin)
    {
        $admin->update($request->all());
        return $admin;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *      path="api/admins/{id}",
     *      summary="Delete admin by id.",
     *      tags={"Admin"},
     *      @OA\Parameter( 
     *          in="path", 
     *          name="id", 
     *          required=true, 
     *          description="ID", 
     *          @OA\Schema( type="integer", ref="#/components/schemas/Admin/properties/id") 
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
    public function destroy(Admin $admin)
    {
        $admin->delete();
    }
}

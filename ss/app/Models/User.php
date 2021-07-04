<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * required={"name", "email", "password"},
 * @OA\Xml(name="User"),
 * @OA\Property(property="id", ref="#/components/schemas/BaseModel/properties/id"),
 * @OA\Property(property="name", type="string"),
 * @OA\Property(property="email", type="string", format="email"),
 * @OA\Property(property="email_verified_at", type="string", format="email"),
 * @OA\Property(property="password", type="string"),
 * @OA\Property(property="status", type="integer", example="Trạng thái: 1-kích hoạt, 2-vô hiệu, 3-đã xóa"),
 * @OA\Property(property="position", type="integer", example="1"),
 * @OA\Property(property="created_by", ref="#/components/schemas/BaseModel/properties/created_by"),
 * @OA\Property(property="updated_by", ref="#/components/schemas/BaseModel/properties/updated_at"),
 * @OA\Property(property="deleted_by", ref="#/components/schemas/BaseModel/properties/deleted_at"),
 * @OA\Property(property="created_at", ref="#/components/schemas/BaseModel/properties/created_at"),
 * @OA\Property(property="update_at", ref="#/components/schemas/BaseModel/properties/updated_at"),
 * @OA\Property(property="deleted_at", ref="#/components/schemas/BaseModel/properties/deleted_at"),
 * )
 */

class User extends Model
{
    public $table = 'users';

    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'status',
        'position',
    ];
}

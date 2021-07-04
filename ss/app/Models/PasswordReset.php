<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * required={"name"},
 * @OA\Xml(name="PasswordReset"),
 * @OA\Property(property="id", ref="#/components/schemas/BaseModel/properties/id"),
 * @OA\Property(property="email", type="string"),
 * @OA\Property(property="token", type="string"),
 * @OA\Property(property="created_at", ref="#/components/schemas/BaseModel/properties/created_at"),
 * @OA\Property(property="update_at", ref="#/components/schemas/BaseModel/properties/updated_at"),
 * )
 */

class PasswordReset extends Model
{
    public $table = 'password_resets';

    public $fillable = [
        'email',
        'token',
    ];
}

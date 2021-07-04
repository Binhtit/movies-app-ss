<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * required={"name", "image"},
 * @OA\Xml(name="Ad"),
 * @OA\Property(property="id", ref="#/components/schemas/BaseModel/properties/id"),
 * @OA\Property(property="name", type="string", example="Ad 1"),
 * @OA\Property(property="image", type="string", example="upload/image.jpg"),
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

class Ad extends Model
{
    public $table = 'ads';

    public $fillable = [
        'name',
        'status',
        'position',
    ];
}

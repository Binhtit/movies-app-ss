<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * required={"name"},
 * @OA\Xml(name="Episode"),
 * @OA\Property(property="id", ref="#/components/schemas/BaseModel/properties/id"),
 * @OA\Property(property="name", type="string", example="Tập 1"),
 * @OA\Property(property="link", type="string", example="https://www.youtube.com/watch?v=yCvSR4lSqTg"),
 * @OA\Property(property="film_id", type="integer", example="1"),
 * @OA\Property(property="thumbnail", type="string", example="upload/img.jpg"),
 * @OA\Property(property="description", type="string", example="Description"),
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

class Episode extends Model
{
    public $table = 'episodes';

    public $fillable = [
        'name',
        'link',
        'film_id',
        'thumbnail',
        'description',
        'status',
        'position',
    ];
}

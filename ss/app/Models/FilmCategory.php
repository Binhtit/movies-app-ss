<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * required={"name"},
 * @OA\Xml(name="FilmCategory"),
 * @OA\Property(property="id", type="integer", readOnly="true"),
 * @OA\Property(property="name", type="string", example="2D"),
 * @OA\Property(property="status", type="integer", example="Trạng thái: 1-kích hoạt, 2-vô hiệu, 3-đã xóa"),
 * @OA\Property(property="position", type="integer", example="số"),
 * @OA\Property(property="created_by", type="string", example="Ng tạo"),
 * @OA\Property(property="updated_by", type="string", example="Ng sửa"),
 * @OA\Property(property="deleted_by", type="string", example="Ng xóa"),
 * @OA\Property(property="created_at", ref="#/components/schemas/BaseModel/properties/created_at"),
 * @OA\Property(property="update_at", ref="#/components/schemas/BaseModel/properties/updated_at"),
 * @OA\Property(property="deleted_at", ref="#/components/schemas/BaseModel/properties/deleted_at"),
 * )
 */

class FilmCategory extends Model
{
    public $table = 'film_categories';

    public $fillable = [
        'name',
        'status',
        'position',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * @OA\Property(property="id", type="integer", readOnly="true"),
 * @OA\Property(property="created_by", type="string", example="Ng tạo", readOnly="true"),
 * @OA\Property(property="updated_by", type="string", example="Ng sửa", readOnly="true"),
 * @OA\Property(property="deleted_by", type="string", example="Ng xóa", readOnly="true"),
 * @OA\Property(property="created_at", type="string", format="date-time", description="Initial creation timestamp", readOnly="true"),
 * @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp", readOnly="true"),
 * @OA\Property(property="deleted_at", type="string", format="date-time", description="Soft delete timestamp", readOnly="true"),
 * )
 * Class BaseModel
 *
 * @package App\Models
 */

abstract class BaseModel extends Model
{
    //
}

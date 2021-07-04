<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * required={"name", "category_id", "description"},
 * @OA\Xml(name="Film"),
 * @OA\Property(property="id", type="integer", readOnly="true"),
 * @OA\Property(property="name", type="string", example="Hospital Playlist"),
 * @OA\Property(property="author", type="string", example="Biên kịch, đạo diễn ..."),
 * @OA\Property(property="cast", type="string", example="Diễn viên"),
 * @OA\Property(property="country", type="integer", example="Quốc gia"),
 * @OA\Property(property="category_id", type="integer", example="Chuyên mục: 3D or 2D ..."),
 * @OA\Property(property="episodes", type="integer", example="Số tập"),
 * @OA\Property(property="description", type="string", example="Mô tả film"),
 * @OA\Property(property="star", type="integer", example="Đánh giá"),
 * @OA\Property(property="release_date", type="datetime", format="date-time", example="Ngày ra mắt"),
 * @OA\Property(property="type_id", type="integer", example="Kiếm hiệp, tình cảm ..."),
 * @OA\Property(property="image", type="string", example="Hình ảnh"),
 * @OA\Property(property="banner", type="string", example="Hình ảnh"),
 * @OA\Property(property="running_time", type="string", example="Thời gian mỗi tập"),
 * @OA\Property(property="time_slot", type="string", example="Giờ chiếu"),
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

class Film extends Model
{
    public $table = 'films';

    public $fillable = [
        'name',
        'author',
        'cast',
        'country',
        'category_id',
        'episodes',
        'description',
        'star',
        'release_date',
        'type_id',
        'image',
        'banner',
        'running_time',
        'time_slot',
        'status',
        'position',
    ];
}

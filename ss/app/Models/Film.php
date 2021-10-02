<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * required={"name", "category_id", "description"},
 * @OA\Xml(name="Film"),
 * @OA\Property(property="id", ref="#/components/schemas/BaseModel/properties/id"),
 * @OA\Property(property="name", type="string", example="Hospital Playlist"),
 * @OA\Property(property="author", type="string", example="Biên kịch, đạo diễn ..."),
 * @OA\Property(property="cast", type="string", example="Diễn viên"),
 * @OA\Property(property="country", type="integer", example="1"),
 * @OA\Property(property="category_id", type="integer", example="1"),
 * @OA\Property(property="episodes", type="integer", example="20"),
 * @OA\Property(property="description", type="string", example="Mô tả film"),
 * @OA\Property(property="star", type="integer", example="5"),
 * @OA\Property(property="release_date", type="datetime", format="date-time", example="20/09/1998"),
 * @OA\Property(property="type_id", type="integer", example="1"),
 * @OA\Property(property="image", type="string", example="Hình ảnh"),
 * @OA\Property(property="banner", type="string", example="Hình ảnh"),
 * @OA\Property(property="running_time", type="string", example="Thời gian mỗi tập"),
 * @OA\Property(property="time_slot", type="string", example="Giờ chiếu"),
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

class Film extends Model
{
    public $table = 'films';

    public $fillable = [
        'name',
        'author',
        'cast',
        'country_id',
        'category_id',
        'total_episodes',
        'newest_episode',
        'description',
        'star',
        'release_date',
        'type_id',
        'image',
        'image_mobile',
        'banner',
        'banner_mobile',
        'film_status',
        'resolution',
        'language',
        'imdb',
        'running_time',
        'time_slot',
        'status',
        'position',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\FilmCategory');
    }

    public function type(){
        return $this->belongsTo('App\Models\Type');
    }

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

    public function episodes()
    {
        return $this->hasMany('App\Models\Episode');
    }
}

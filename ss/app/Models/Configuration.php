<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * required={"domain"},
 * @OA\Xml(name="Configuration"),
 * @OA\Property(property="id", ref="#/components/schemas/BaseModel/properties/id"),
 * @OA\Property(property="domain", type="string"),
 * @OA\Property(property="domain_template_id", type="integer"),
 * @OA\Property(property="site_name", type="string"),
 * @OA\Property(property="site_description", type="string"),
 * @OA\Property(property="keyword", type="string"),
 * @OA\Property(property="company_name", type="string"),
 * @OA\Property(property="address", type="string"),
 * @OA\Property(property="email", type="string"),
 * @OA\Property(property="phone_number", type="string"),
 * @OA\Property(property="header", type="string"),
 * @OA\Property(property="footer", type="string"),
 * @OA\Property(property="logo", type="string"),
 * @OA\Property(property="facebook", type="string"),
 * @OA\Property(property="youtube", type="string"),
 * @OA\Property(property="instagram", type="string"),
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

class Configuration extends Model
{
    public $table = 'configurations';

    public $fillable = [
        'domain',
        'domain_template_id',
        'site_name',
        'site_description',
        'keyword',
        'company_name',
        'address',
        'email',
        'phone_number',
        'header',
        'footer',
        'logo',
        'facebook',
        'youtube',
        'instagram',
        'status',
        'position',
    ];
}

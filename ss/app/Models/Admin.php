<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $table = 'admins';

    public $fillable = [
        'admin_email',
        'admin_password',
        'admin_name',
        'admin_phone',
        'create_at',
        'update_at',
    ];
}

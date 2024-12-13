<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    use HasFactory;

    protected $fillable = ['tokenable_id', 'tokenable_type', 'name', 'token', 'abilities', 'last_used_at', 'expires_at'];
} 
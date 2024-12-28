<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi secara mass assignment
    protected $fillable = ['name'];

    // Relasi dengan model User
    public function users()
    {
        return $this->hasMany(User::class, 'role_id'); // Relasi ke tabel users melalui foreign key role_id
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'nombre',
        'cantidad_almacenada'
    ];

    public function passwords()
    {
        return $this->hasMany(Password::class, 'folder_id');
    }
}

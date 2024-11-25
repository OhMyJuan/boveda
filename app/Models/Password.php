<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Password extends Model
{
    protected $fillable = [
        'user_id',
        'service_name',
        'encrypted_password',
        'direccion',
        'folder_id'
    ];

    public function setEncryptedPasswordAttribute($value)
    {
        $this->attributes['encrypted_password'] = Crypt::encryptString($value);
    }

    public function getEncryptedPasswordAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'email',
    ];

    public function hewans()
    {
        return $this->hasMany(Hewan::class);
    }

}

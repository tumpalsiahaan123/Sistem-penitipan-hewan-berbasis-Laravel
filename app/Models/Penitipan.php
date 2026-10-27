<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penitipan extends Model
{
    protected $fillable = [
        'owner_id',
        'hewan_id',
        'tanggal_masuk',
        'tanggal_keluar',
        'status',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function hewan()
    {
        return $this->belongsTo(Hewan::class);
    }
}

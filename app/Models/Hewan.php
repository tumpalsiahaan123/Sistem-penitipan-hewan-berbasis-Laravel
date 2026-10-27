<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_pemilik',
        'nama_hewan',
        'jenis_hewan',
        'ras',
        'deskripsi_kesehatan',
        'tanggal_masuk',
        'tanggal_keluar',
        'status'
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
        'tanggal_keluar' => 'date',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }


    // Scope untuk pencarian
    public function scopeSearch($query, $keyword)
    {
        return $query->where('nama_hewan', 'like', "%{$keyword}%")
                    ->orWhere('nama_pemilik', 'like', "%{$keyword}%")
                    ->orWhere('jenis_hewan', 'like', "%{$keyword}%")
                    ->orWhere('ras', 'like', "%{$keyword}%");
    }
}

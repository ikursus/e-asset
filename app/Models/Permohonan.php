<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    /** @use HasFactory<\Database\Factories\PermohonanFactory> */
    use HasFactory;

    protected $table = 'permohonans';

    protected $fillable = [
        'pemohon_id',
        'status',
        'tujuan',
        'tempat_digunakan'
    ];

    public function permohonanItems()
    {
        // return $this->hasMany(PermohonanItem::class);
        return $this->hasMany(PermohonanItem::class, 'permohonan_id', 'id');
    }
}

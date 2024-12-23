<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermohonanItem extends Model
{

    protected $fillable = [
        'permohonan_id',
        'asset_id',
        'kuantiti',
        'catatan',
        'status',
    ];

    public function asset()
    {
        //return $this->belongsTo(Asset::class);
        return $this->belongsTo(Asset::class, 'asset_id', 'id');

    }
}

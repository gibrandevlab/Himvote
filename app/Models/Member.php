<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'universitas',
        'nama',
        'alamat',
        'nim',
        'nomor_telpon',
        'pekerjaan',
        'divisi',
        'jabatan',
        'periode',
    ];

    protected $casts = [
        'nim' => 'string',
        'divisi' => 'string',
        'jabatan' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


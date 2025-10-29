<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status'
    ];

    public function department()
    {
        return $this->belongsTo(related: Department::class);
    }

    public function position()
    {
        return $this->belongsTo(\App\Models\Position::class, 'position_id', 'id');
    }
}

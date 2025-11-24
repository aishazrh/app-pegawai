<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = [
        'karyawan_id',
        'nama_karyawan',
        'departemen',
        'jabatan',
        'tipe_pengajuan',
        'tanggal_pengajuan',
        'dokumen',
    ];

    // relasi ke employee
    public function karyawan()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}

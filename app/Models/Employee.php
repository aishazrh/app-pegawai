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
        'status',
        'department_id',
        'jabatan_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'jabatan_id');
    }

    public function salary()
    {
        return $this->hasMany(Salary::class, 'karyawan_id');
    }

    public function getSalaryTotalAttribute()
    {
        $latestSalary = $this->salary()->latest()->first();
        if ($latestSalary) {
            return $latestSalary->gaji_pokok + $latestSalary->tunjangan - $latestSalary->potongan;
        }
        return 0;
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}

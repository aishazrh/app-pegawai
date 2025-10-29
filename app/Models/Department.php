<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $fillable = ['nama_departemen', 'head_employee_id'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id');
    }

    public function head()
    {
        return $this->belongsTo(Employee::class, 'head_employee_id');
    }

    public function headByPosition()
    {
        return $this->hasOne(\App\Models\Employee::class, 'department_id', 'id')
            ->whereHas('position', function ($q) {
            $q->where('nama_jabatan', 'Kepala Departemen');
        });
    }
}

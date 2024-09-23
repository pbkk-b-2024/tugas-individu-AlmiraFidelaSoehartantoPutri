<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'fakultas';
    protected $primaryKey = 'fakultas_id';

    public function universitas()
    {
        return $this->belongsTo(Universitas::class, 'universitas_id');
    }

    public function programStudi()
    {
        return $this->hasMany(ProgramStudi::class, 'fakultas_id');
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'fakultas_id');
    }
}
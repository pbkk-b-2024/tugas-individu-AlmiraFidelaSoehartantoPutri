<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    protected $table = 'program_studi';
    protected $primaryKey = 'program_studi_id';

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'program_studi_id');
    }

    public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class, 'program_studi_id');
    }

    public function akreditasi()
    {
        return $this->hasOne(Akreditasi::class, 'program_studi_id');
    }

    public function kurikulum()
    {
        return $this->hasMany(Kurikulum::class, 'program_studi_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universitas extends Model
{
    protected $table = 'universitas';
    protected $primaryKey = 'universitas_id';

    public function fakultas()
    {
        return $this->hasMany(Fakultas::class, 'universitas_id');
    }

    public function tendik()
    {
        return $this->hasMany(Tendik::class, 'universitas_id');
    }
}
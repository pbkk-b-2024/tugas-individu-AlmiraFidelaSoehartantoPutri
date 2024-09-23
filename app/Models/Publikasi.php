<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    protected $table = 'publikasi';
    protected $primaryKey = 'publikasi_id';

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
}

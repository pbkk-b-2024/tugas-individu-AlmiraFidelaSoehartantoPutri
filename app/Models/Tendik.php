<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tendik extends Model
{
    protected $table = 'tendik';
    protected $primaryKey = 'tendik_id';

    public function universitas()
    {
        return $this->belongsTo(Universitas::class, 'universitas_id');
    }
}

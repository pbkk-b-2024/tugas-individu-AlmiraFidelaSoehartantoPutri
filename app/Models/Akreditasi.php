<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akreditasi extends Model
{
    protected $table = 'akreditasi';
    protected $primaryKey = 'akreditasi_id';

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi_id');
    }
}

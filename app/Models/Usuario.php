<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function uploadsFotos(){
        return $this->hasMany(Upload::class, 'id_usuario', 'id');
    }
    use HasFactory;
}

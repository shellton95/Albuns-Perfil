<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public function perfil() {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }

    use HasFactory;
}

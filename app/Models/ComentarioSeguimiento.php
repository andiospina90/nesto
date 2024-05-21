<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioSeguimiento extends Model
{
    use HasFactory;

    protected $table = 'comentarios_seguimiento';

    protected $fillable = [
        'id_tarea',
        'comentario',
    ];

    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'id_tarea');
    }
}

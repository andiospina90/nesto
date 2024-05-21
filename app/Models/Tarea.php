<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_proyecto',
        'estado',
        'nombre',
        'descripcion',
        'prioridad',
        'id_usuario',
    ];

    // Si hay una relación con el modelo Proyecto, puedes definirla aquí
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function comentarios()
    {
        return $this->hasMany(ComentarioSeguimiento::class, 'id_tarea');
    }
}

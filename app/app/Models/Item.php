<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $primaryKey = 'id_item';
    protected $fillable = [
        'nombre_item',
        'descripcion', 
        'stack_maximo',
        'id_rareza',
        'id_categoria'
    ];

    public function rareza()
    {
        return $this->belongsTo(Rareza::class, 'id_rareza', 'id_rareza');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }
}

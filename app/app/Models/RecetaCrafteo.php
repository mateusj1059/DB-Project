<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RecetaCrafteo extends Model
{
    protected $table = 'recetas_crafteo';
    protected $primaryKey = 'id_receta';
    protected $fillable = ['cantidad', 'posicion', 'nombre_mesa', 'id_item'];
    public function item()
    {
        return $this->belongsTo(Item::class, 'id_item', 'id_item');
    }
}

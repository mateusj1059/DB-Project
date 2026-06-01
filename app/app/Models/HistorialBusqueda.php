<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class HistorialBusqueda extends Model
{
    protected $table = 'historial_busqueda';
    protected $primaryKey = 'id_historial';
    protected $fillable = ['resultado_busqueda', 'fecha_busqueda', 'id_usuario', 'id_item'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'id_item', 'id_item');
    }
}
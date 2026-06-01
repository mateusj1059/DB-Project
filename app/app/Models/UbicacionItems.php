<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UbicacionItems extends Model
{
    protected $table = 'ubicacion_items';
    protected $primaryKey = 'id_ubicacion';
    protected $fillable = ['capa_min', 'capa_max', 'id_bioma', 'id_estructura', 'id_criatura'];

    public function bioma()
    {
        return $this->belongsTo(Bioma::class, 'id_bioma', 'id_bioma');
    }

    public function estructura()
    {
        return $this->belongsTo(Estructura::class, 'id_estructura', 'id_estructura');
    }

    public function criatura()
    {
        return $this->belongsTo(Criatura::class, 'id_criatura', 'id_criatura');
    }
}
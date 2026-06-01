<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Favoritos extends Model
{
    protected $table = 'favoritos';
    protected $primaryKey = 'id_favoritos';
    protected $fillable = ['fecha_agregado', 'id_usuario', 'id_item'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'id_item', 'id_item');
    }
}
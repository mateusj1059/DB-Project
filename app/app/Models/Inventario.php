<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Inventario extends Model
{
    protected $table = 'inventario';
    protected $primaryKey = 'id_inventario';
    protected $fillable = ['cantidad', 'id_usuario', 'id_item'];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
    public function item()
    {
        return $this->belongsTo(Item::class, 'id_item', 'id_item');
    }
}

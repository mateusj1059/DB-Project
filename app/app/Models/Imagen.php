<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagen';
    protected $primaryKey = 'id_imagen';
    protected $fillable = ['clave', 'campo', 'tipo'];
}
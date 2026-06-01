<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MesaTrabajo extends Model
{
    protected $table = 'mesa_trabajo';
    protected $primaryKey = 'id_mesa';
    protected $fillable = ['nombre_mesa'];
}
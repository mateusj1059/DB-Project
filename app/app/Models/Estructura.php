<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Estructura extends Model
{
    protected $table = 'estructura';
    protected $primaryKey = 'id_estructura';
    protected $fillable = ['nombre_estructura'];
}
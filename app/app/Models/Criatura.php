<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Criatura extends Model
{
    protected $table = 'criatura';
    protected $primaryKey = 'id_criatura';
    protected $fillable = ['nombre_criatura'];
}
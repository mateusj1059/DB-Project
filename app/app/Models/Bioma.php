<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Bioma extends Model
{
    protected $table = 'bioma';
    protected $primaryKey = 'id_bioma';
    protected $fillable = ['nombre_bioma'];
}

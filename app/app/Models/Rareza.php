<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Rareza extends Model
{
    protected $table = 'rareza';
    protected $primaryKey = 'id_rareza';
    protected $fillable = ['nombre_rareza'];
}

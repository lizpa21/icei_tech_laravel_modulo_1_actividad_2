<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catequistas extends Model
{
    use HasFactory;

    protected $table = "catequistas";

    protected $fillable = ['nombre', 'celular', 'correo', 'parroquia', 'grupo'];
    protected $hidden = ['id'];

    public function obtenerCatequista()
    {
        return Catequistas::all();
    }

    public function obtenerCatequistaPorId($id)
    {
        return Catequistas::find($id);
    }

}

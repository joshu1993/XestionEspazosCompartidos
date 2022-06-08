<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evento;
use App\Models\Image;
use App\Models\Role;

class Sala extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion', 
        'metrosCuadrados', 
        'aforo', 
        'proyector',
        'color'
        
    ];

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function salaRoles()
    {
        return $this->belongsToMany(Role::class,'sala_roles');
    }


}

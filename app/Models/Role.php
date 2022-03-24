<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Sala;

class Role extends Model
{
    use HasFactory;
    
    protected $fillable = [
        
        'nombreRol', 
    ];

    //relacion uno a muchos
    public function user()
    {
        return $this->hasOne(User::class);
    }


    public function roleSalas()
    {
        return $this->belongsToMany(Sala::class, 'sala_roles');
    }
}

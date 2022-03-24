<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sala;
use App\Models\Role;

class SalaRole extends Model
{
    use HasFactory;
    protected $fillable = [
        'sala_id',
        'role_id', 
       
    ];
}

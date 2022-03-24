<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Sala;

class Evento extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'start', 
        'end', 
        'user_id',
        'sala_id',
        'descripcion'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
}

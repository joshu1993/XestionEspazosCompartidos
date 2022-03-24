<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sala;

class Image extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'sala_id',
    ];

    public function salas()
    {
        return $this->belongsTo(Sala::class);
    }
}

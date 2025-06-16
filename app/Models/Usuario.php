<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    const CREATED_AT = null;
    const UPDATED_AT = null;


    //Seleção dos campos do banco de dados que são alteráveis
    protected $fillable = [
        'nome',
        'email',
        'password',
    ];

    public function avisos() :HasMany
    {
        return $this->hasMany(Aviso::class);
    }


    
}

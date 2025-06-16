<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Aviso extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'titulo',
        'descricao',
        'link',
        'id_usuario'
    ];

    public function usuario(): BelongsTo{
        return $this->belongsTo(Usuario::class);
    }

    public function tags(): BelongsToMany{
        return $this->belongsToMany(Tag::class, 'tags_avisos');
    }
}

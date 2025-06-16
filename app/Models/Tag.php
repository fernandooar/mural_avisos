<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'nome'
    ];

    public function avisos(): BelongsToMany{
        return $this->belongsToMany(Aviso::class, 'tags_avisos');
    }
}

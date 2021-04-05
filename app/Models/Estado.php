<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cidade;
class Estado extends Model
{
    use HasFactory;

    public function cidades()
    {
        return $this->hasMany(Cidade::class, 'estados_id');
    }
}

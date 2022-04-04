<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'distrito_id'];

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

    public function pesquisar($filter)
    {
        $resultados = $this->where(function ($query) use ($filter) {
            if ($filter) {
                $query->where('');
            }
        });

        return $resultados;
    }
}

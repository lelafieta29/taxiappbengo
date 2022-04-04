<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    use HasFactory;

    protected $fillable = ['cnh', 'telefone', 'nascimento', 'vencimento_cnh', 'user_id', 'empresa_transportes_id'];
    protected $table = 'motoristas';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function empresaTransporte()
    {
        return $this->belongsTo(EmpresaTransporte::class);
    }

    public function viagens()
    {
        return $this->belongsToMany(Viagem::class);
    }
}

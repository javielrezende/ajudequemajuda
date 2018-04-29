<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'descricao', 'dataInicio', 'dataFim', 'campanhas_id', 'status',
    ];

    public function campanha(){
        return $this->belongsTo('App\Campanha', 'campanhas_id');
    }
}

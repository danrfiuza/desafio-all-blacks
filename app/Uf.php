<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    public $timestamps = true;
    public $table = 'cidades';
    protected $primaryKey = 'uf';
    public $incrementing = false;
    protected $fillable = [
        'uf',
        'cidade',
        'ativo'
    ];
    protected $hidden = [
        '_token',
    ];

    public function cidades()
    {
        return $this->hasMany(Cidade::class,'uf','uf');
    }
}

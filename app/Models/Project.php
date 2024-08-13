<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Para evitar erro de conversão de timestamps
    public function getDateFormat(){
        return 'Y-d-m H:i:s.v';
    }

    protected $fillable = ['titulo', 'descricao'];

    public function tasks(){
        return $this->hasMany(Task::class, 'project_id');
    }

    // Escopo adicionado ao projeto, para os retornos vierem por padrão do mais recente pro mais antigo
    public static function booted(){
        self::addGlobalScope('ordered', function(Builder $queryBuilder){
            $queryBuilder->orderBy('created_at', 'desc');
        });
    }

}

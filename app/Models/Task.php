<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'titulo', 'descricao', 'status', 'dt_vencimento'];

    public function project(){
        return $this->belongTo(Project::class);
    }
}

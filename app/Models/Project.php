<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao'];

    public function tasks(){
        return $this->hasMany(Project::class, 'id');
    }

}

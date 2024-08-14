<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;

    // Para evitar erro de conversão de timestamps
    public function getDateFormat(){
        return 'Y-d-m H:i:s.v';
    }

    protected $fillable = ['project_id', 'titulo', 'descricao', 'status', 'dt_vencimento'];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    /**
     * The users that belong to the role.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}

<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgentNew extends Model
{
    use HasFactory;
    protected $table = 'agent_news';
    protected $fillable = [
        'name',
        'email',
        'system_id',
        'phone',
        'manager_id',
        'image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
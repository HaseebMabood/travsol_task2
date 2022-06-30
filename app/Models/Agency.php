<?php

namespace App\Models;

use App\Models\SubAgency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agency extends Model
{
    use HasFactory;

    protected $table = 'agencies';
    protected $fillable = [
        'name',
        'email',
        'license_no',
        'Location',
        'Contact_no',
        'manager_id'
    ];

    public function subagencies()
    {
        return $this->hasMany(SubAgency::class);
    }
}
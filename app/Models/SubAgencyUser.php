<?php

namespace App\Models;

use App\Models\SubAgency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubAgencyUser extends Model
{
    use HasFactory;

    protected $table = 'sub_agency_users';
    protected $fillable = [
        'name',
        'email',
        'system_id',
        'phone',
        'address',
        'subagency_id',
        'manager_id',
        'image',
    ];

    public function subagency()
    {
        return $this->belongsTo(SubAgency::class,'subagency_id','id');
    }
   
}
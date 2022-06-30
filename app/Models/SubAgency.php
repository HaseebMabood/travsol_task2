<?php

namespace App\Models;

use App\Models\Agency;
use App\Models\SubAgencyUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubAgency extends Model
{
    use HasFactory;

    protected $table = 'sub_agencies';
    protected $fillable = [
        'name',
        'email',
        'license_no',
        'location',
        'contact_no',
        'parent_agency_id'
    ];



    public function agencies()
    {
        return $this->belongsTo(Agency::class,'parent_agency_id','id');
    }

    public function subagencyusers()
    {
        return $this->hasMany(SubAgencyUser::class);
    }
}
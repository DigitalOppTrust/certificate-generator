<?php

namespace App\Models;

use App\Models\Traits\ShortUniqueUuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    use HasFactory, ShortUniqueUuidTrait, SoftDeletes;

    public function issuances()
    {
        return $this->hasMany(Issuance::class);
    }

    public function users()
    {
        return $this->hasMany(CertificateUser::class);
        // return $this->belongsToMany(User::class, 'certificate_user_id');
    }

    public function assets()
    {
        return $this->hasMany(CertificateAsset::class);
    }

    public function elements()
    {
        return $this->hasMany(CertificateElement::class);
    }

    public function fields()
    {
        return $this->hasMany(CertificateField::class);
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}

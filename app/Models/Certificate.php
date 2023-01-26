<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    public function issuances()
    {
        return $this->hasMany(Issuance::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'certificate_user_id');
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
}

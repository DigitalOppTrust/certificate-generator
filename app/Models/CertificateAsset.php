<?php

namespace App\Models;

use App\Models\Traits\ShortUniqueUuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificateAsset extends Model
{
    use HasFactory, ShortUniqueUuidTrait, SoftDeletes;

    protected $fillable = [
        'user_id',
        'certificate_id',
        'path',
    ];

    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}

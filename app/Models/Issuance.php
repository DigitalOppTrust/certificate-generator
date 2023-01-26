<?php

namespace App\Models;

use App\Models\Traits\ShortUniqueUuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issuance extends Model
{
    use HasFactory, ShortUniqueUuidTrait, SoftDeletes;

    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }
}

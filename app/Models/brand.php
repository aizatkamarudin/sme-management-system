<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{

    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'name',
        'is_deleted',
        'created_at',
    ];

    public function getType()
    {
        return $this->belongsTo(TypeDevice::class, 'type', 'id');
    }
}


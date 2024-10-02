<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDevice extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'type_devices',
        'is_deleted',
        'created_at',
    ];

}

<?php

namespace App\Models;

use App\Http\Controllers\BrandController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'serial_number',
        'condition',
        'category',
        'is_deleted',
        'created_at',
    ];

    public function getBrand()
    {
        return $this->belongsTo(brand::class, 'brand_id', 'id');
    }

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function getCondition()
    {
        return $this->belongsTo(Condition::class, 'condition', 'id');
    }
}

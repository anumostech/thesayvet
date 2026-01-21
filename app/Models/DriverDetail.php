<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriverDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'product_id',
        'name',
        'phone',
        'email',
        'address',
        'assigned_by',
        'assigned_date'
    ];

    protected $casts = [
        'assigned_date' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}


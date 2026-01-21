<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'driver_id',
        'order_date',
        'subtotal',
        'vat_amount',
        'total_amount',
        'vetenery_approved',
        'sales_approved_by',
        'sales_approved_date',
        'accounts_approved_by',
        'accounts_approved_date',
        'warehouse_user_id',
        'warehouse_dispatched_date',
        'order_status',
        'notes'
    ];

    protected $casts = [
        'vetenery_approved' => 'boolean',
        'order_date' => 'datetime',
        'sales_approved_date' => 'datetime',
        'accounts_approved_date' => 'datetime',
        'warehouse_dispatched_date' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function driver()
    {
        return $this->belongsTo(DriverDetail::class);
    }

    public function items()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function salesApprover()
    {
        return $this->belongsTo(User::class, 'sales_approved_by');
    }

    public function accountsApprover()
    {
        return $this->belongsTo(User::class, 'accounts_approved_by');
    }

    public function warehouseUser()
    {
        return $this->belongsTo(User::class, 'warehouse_user_id');
    }
}


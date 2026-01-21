<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'username',
        'password',
        'type',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationships
    public function details()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function ordersApprovedBySales()
    {
        return $this->hasMany(Order::class, 'sales_approved_by');
    }

    public function ordersApprovedByAccounts()
    {
        return $this->hasMany(Order::class, 'accounts_approved_by');
    }
}

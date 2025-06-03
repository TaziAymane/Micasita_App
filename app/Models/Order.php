<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['profile_id', 'notes', 'payment_method', 'total'];

    public function items() {
        return $this->hasMany(OrderItem::class);
    }

    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}

<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
       protected $fillable = [
        'order_number', 'order_date', 'execution_date', 'delivery_date',
        'payment_method', 'email', 'phone', 'customer_name', 'national_id',
        'date_of_birth', 'address_country', 'address_province', 'address_city',
        'address_near_landmark', 'mastercard_number',
    ];
        protected $casts = [
        'order_date' => 'datetime',
        'execution_date' => 'datetime',
        'delivery_date' => 'datetime',
        'date_of_birth' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
public function products()
{
    return $this->belongsToMany(Product::class)
    ->withPivot('quantity', 'price')
    ->withTimestamps();
}
}
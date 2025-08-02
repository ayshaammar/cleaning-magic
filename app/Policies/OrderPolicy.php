<?php
namespace App\Policies;
use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    // السماح للمستخدم المشرف (Admin) بكل الصلاحيات
    public function before(User $user, $ability)
    {
        if ($user->role === 'admin') {
            return true;
        }
        return null; // تترك التحقق للدوال الأخرى إذا لم يكن admin
    }
    public function view(User $user, Order $order)
    {
        return $user->id === $order->user_id;
    }
    public function update(User $user, Order $order)
    {
        return $user->id === $order->user_id;
    }
    public function delete(User $user, Order $order)
    {
        return $user->id === $order->user_id;
    }
}

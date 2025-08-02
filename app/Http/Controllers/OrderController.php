<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // عرض الطلبات الخاصة بالمستخدم (العميل أو الأدمن)
    public function index()
    {
        // إذا كان الأدمن، يعرض كل الطلبات، وإذا كان عميل يعرض طلباته فقط
        if (Auth::user()->role === 'admin') {
            $orders = Order::latest()->paginate(10);
        } else {
            $orders = Auth::user()->orders()->latest()->paginate(10);
        }
        return view('orders.index', compact('orders'));
    }
    // عرض نموذج إنشاء طلب جديد
    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }
    // تخزين الطلب الجديد مع ربط المنتجات
    public function store(StoreOrderRequest $request)
    {
        DB::transaction(function () use ($request) {
            $order = Auth::user()->orders()->create($request->only([
                'order_number',
                'order_date',
                'execution_date',
                'delivery_date',
                'payment_method',
                'email',
                'phone',
                'customer_name',
                'national_id',
                'date_of_birth',
                'address_country',
                'address_province',
                'address_city',
                'address_near_landmark',
                'mastercard_number',
            ]));
            foreach ($request->products as $product) {
                $order->products()->attach($product['product_id'], [
                    'quantity' => $product['quantity'],
                    'price' => $product['price'],
                ]);
            }
        });

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }
    // عرض تفاصيل طلب معين
    public function show(Order $order)
    {
        $this->authorize('view', $order); // تحقق الصلاحية
        return view('orders.show', compact('order'));
    }
    // عرض نموذج تعديل طلب معين
    public function edit(Order $order)
    {
        $this->authorize('update', $order); // تحقق الصلاحية
        $products = Product::all();
        return view('orders.edit', compact('order', 'products'));
    }
    // تحديث طلب معين
    public function update(StoreOrderRequest $request, Order $order)
    {
        $this->authorize('update', $order); // تحقق الصلاحية

        DB::transaction(function () use ($request, $order) {
            $order->update($request->only([
                'order_number',
                'order_date',
                'execution_date',
                'delivery_date',
                'payment_method',
                'email',
                'phone',
                'customer_name',
                'national_id',
                'date_of_birth',
                'address_country',
                'address_province',
                'address_city',
                'address_near_landmark',
                'mastercard_number',
            ]));
            $syncData = [];
            foreach ($request->products as $product) {
                $syncData[$product['product_id']] = [
                    'quantity' => $product['quantity'],
                    'price' => $product['price'],
                ];
            }
            $order->products()->sync($syncData);
        });
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }
    // حذف طلب معين
    public function destroy(Order $order)
    {
        $this->authorize('delete', $order); // تحقق الصلاحية
        $order->products()->detach();
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}

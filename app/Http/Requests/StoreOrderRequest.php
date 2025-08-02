<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }
    public function rules()
    {
        // لو هذا طلب تحديث، هنتجنب التحقق الفريد على order_number لنفس الطلب
        $orderId = $this->route('order') ? $this->route('order')->id : null;

        return [
            'order_number' => [
                'required',
                'string',
                Rule::unique('orders', 'order_number')->ignore($orderId),
            ],
            'order_date' => 'required|date',
            'execution_date' => 'required|date',
            'delivery_date' => 'required|date',
            'payment_method' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'customer_name' => 'required|string|max:255',
            'national_id' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'address_country' => 'required|string|max:100',
            'address_province' => 'required|string|max:100',
            'address_city' => 'required|string|max:100',
            'address_near_landmark' => 'nullable|string|max:255',
            'mastercard_number' => 'nullable|string|max:20',

            // المنتجات اختياري لو ما بتستخدمها حاليًا
            'products' => 'nullable|array',
            'products.*.product_id' => 'required_with:products|exists:products,id',
            'products.*.quantity' => 'required_with:products|integer|min:1',
            'products.*.price' => 'required_with:products|numeric|min:0',
        ];
    }
}

<?php

namespace App\Http\Requests\PurchaseRequest;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'number.*' => 'required',
            'date.*' => 'required',
            'reference.*' => 'required',
            'responsible.*' => 'required',
            'purchase_justifications.*' => 'required',
            'total.*' => 'nullable',
            'required_parts.*' => 'required',
            'quantity.*' => 'required',
            'price.*' => 'nullable',
            'description.*' => 'nullable',
            'product_responsible.*' => 'nullable',
            'total_price.*' => 'nullable',
            'notes.*' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'number.*.required' => ' حقل الرقم مطلوب',
            'date.*.required' => ' حقل التاريخ مطلوب',
            'responsible.*.required' => ' حقل الجهة الطالبة مطلوب',
            'reference.*.required' => ' حقل المرجع مطلوب',
            'purchase_justifications.*.required' => ' حقل مبررات الشراء مطلوب',
            'required_parts.*.required' => ' حقل القطع المطلوبة مطلوب',
            'quantity.*.required' => ' حقل الكمية مطلوب',
        ];
    }
}

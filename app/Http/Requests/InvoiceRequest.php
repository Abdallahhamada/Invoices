<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'invoice_number'=>'required|numeric|unique:invoices',
            'invoice_date'=>'required|date',
            'due_date'=>'required|date',
            'section_id'=>'required|numeric',
            'product'=>'required|string',
            'amount_collection'=>'required',
            'amount_commission'=>'required',
            'rate_vat'=>'required|string',
            'value_vat'=>'required',
            'total'=>'required',
            'note'=>'nullable|string',
            'pic'=>'file|mimes:jpg,png,jpeg,pdf',
        ];
    }
}

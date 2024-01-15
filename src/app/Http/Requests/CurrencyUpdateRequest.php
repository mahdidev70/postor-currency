<?php

namespace PostorShop\CurrencyModules\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PostorShop\CurrencyModules\app\Models\Currency;

class CurrencyUpdateRequest extends FormRequest
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
            'id' => 'required|exists:'.get_class(new Currency()).',id',
            'title' => 'required|string|max:255',
            'key' => 'required|string|max:255|unique:'.get_class(new Currency()).',key,'.$this->id,
            'price' => 'required|numeric'
        ];
    }
}

<?php

namespace PostorShop\CurrencyModules\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PostorShop\CurrencyModules\app\Models\Currency;

class CurrencyUpdateActionRequest extends FormRequest
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
            'key' => 'required|exists:'.get_class(new Currency()).',key',
        ];
    }
}

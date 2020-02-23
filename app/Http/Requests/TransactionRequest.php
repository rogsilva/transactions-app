<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $balance = Auth::user()->wallet->balance ?? 0;
        return [
            'value' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) use ($balance) {
                    if ($value <= 0) {
                        $fail('Valor inválido para transferência.');
                    }

                    if ($balance < $value) {
                        $fail('Você não possui saldo suficiente.');
                    }
                }
            ],
            'wallet' => [
                'required',
            ],
        ];
    }
}

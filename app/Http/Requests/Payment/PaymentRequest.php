<?php

namespace App\Http\Requests\Payment;

use App\Enums\TransactionTypeEnum;
use App\Rules\PaymentAmountCheckRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentRequest extends FormRequest
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
            'user_account_id' => [Rule::exists('user_accounts', 'id')],
            'amount' => ['required', new PaymentAmountCheckRule($this->user_account_id, $this->type)],
            'type' => ['required', Rule::enum(TransactionTypeEnum::class)]
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRolePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => request('user')
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required||exists:App\Models\User,id',
            'role' => 'required|exists:Spatie\Permission\Models\Role,id',
        ];
    }
}

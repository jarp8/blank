<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user')->id ?? null;

        return [
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($userId)],
            'password' => Rule::requiredIf($userId == null),
            'role_id' => 'required'
        ];
    }

    protected function passedValidation(): void
    {
        $request = array_filter($this->all());

        if(isset($request['password'])) {
            $request['password'] = Hash::make($request['password']);
        }

        $this->replace($request);
    }
}

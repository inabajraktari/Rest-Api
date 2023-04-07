<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgentsRequest extends FormRequest
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
        $method = $this->method();
        if($method == 'PUT'){

        return [
        'first_name' => ['required'],
        'last_name' => ['required'],
        'email' => ['required'],
        'phone_number' => ['required'],
        ];
    } else {
        return [
            'first_name' => ['sometimes', 'required'],
            'last_name' => ['sometimes','required'],
            'email' => ['sometimes','required'],
            'phone_number' => ['sometimes','required'],
            ];
    }
}
    protected function prepareForValidation(){
        if($this->phoneNumber){
            $this->merge([
                'phone_number' => $this->phoneNumber
            ]);
        }
        
    }
}

<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreShipmentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null && $user->tokenCan('create');
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            '*.agentsId'=>['required', 'integer'],
            '*.type'=>['required', 'string'],
            '*.status'=>['required', 'string'],
            ];
    }

    protected function prepareForValidation(){
        $data = [];
        foreach ($this->toArray()as $obj){
            $obj['agents_id'] = $obj['agentsId']?? null;
            $obj['type'] = $obj['type']?? null;
            $obj['status'] = $obj['status']?? null;

            $data[]= $obj;
        }
        $this->merge($data);
    }
    
}

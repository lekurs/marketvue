<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShopRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'shop-name' => 'required|max:255',
            'shop-email' => 'required|email|unique:shops,email',
            'shop-description' => 'sometimes',
            'shop-address-1' => 'required',
            'shop-address-2' => 'sometimes',
            'shop-zip' => 'required|max:5',
            'shop-city' => 'required|string',
            'shop-cellular' => 'required|unique:shops,cellular|max:10',
            'shop-phone' => 'sometimes|max:10',
            'shop-activities' => 'sometimes|array',
            'shop-main-activity' => 'sometimes',
            'shop-days' => 'sometimes|array',
            'shop-picture' => 'sometimes',
            'shop-metatitle' => 'sometimes',
            'shop-metakeywords' => 'sometimes|max:255',
            'shop-metadescription' => 'sometimes|max:300',
            'uaid' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'shop-name.required' => 'Le nom doit être remplit',
            'shop-email'
        ];
    }
}

<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // id required while updating customer
        $id = $this->route('customer');

        return [
            'image'      => 'nullable|image|max:3072',
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:customers,email,' . $id,
            'phone'      => 'required|string|unique:customers,phone,' . $id,
            'account_no' => 'required|numeric',
            'about'      => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'image.image'         => "Please upload image files only",
            'email.required'      => "Please enter valid email address",
            'phone.required'      => "Please enter valid phone number",
            'account_no.required' => "Please enter valid account number",

        ];
    }
}

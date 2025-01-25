<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255',
            'mobile' => 'nullable|numeric',
            'dial_code' => 'nullable|string',
            'secondary_contact_number' => 'nullable|string',
            'age' => 'nullable|string',
            'gender' => 'required|in:male,female,other,not_to_say',
            'is_professional' => 'nullable|in:0,1',
            'is_student' => 'required|in:0,1',
            'dob' => 'required|date_format:d-m-Y',
            'city' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            // 'address' => 'required|string|max:255',
            'zipcode' => 'nullable|string|max:10',
            'facebook_link' => 'nullable|string',
            'instagram_link' => 'nullable|string',
            'institution' => 'nullable|required_if:is_student,1|string',
            // 'photographer_category' => 'required|in:1,2',
        ];
    }
    public function messages() : array
    {
        return [
            // 'photographer_category.required' => 'The photographer category is required. <b>( Select any of the category ).</b>',
            'photographer_category.in' => 'Invalid photographer category selected.',
            'is_student.in' => 'Invalid, please select one.',
            'is_student.required' => 'Please choose one to indicate your student status',
            'dob.required' => 'The date of birth field is required.',
            'institution.required_if' => 'This fied is required when you are a student.',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}

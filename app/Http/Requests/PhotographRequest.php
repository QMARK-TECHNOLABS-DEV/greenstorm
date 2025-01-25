<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Models\PhotoCategory;
class PhotographRequest extends FormRequest
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
        $photo_categories = PhotoCategory::select('id')->pluck('id')->toArray();
        return [
            'device' => 'required',
            'location' => 'required',
            'year' => 'required',
            'month' => 'required',
            'description' => 'required',
            'is_tc_accepted' => 'required',
            // 'image' => ['required', 'image', 'mimes:jpeg,jpg', 'max:5120'],
            // 'image' => ['required', 'image', 'mimes:jpeg,jpg', 'max:2048'],
            'image' => ['required', 'image', 'mimes:jpeg,jpg', 'max:10240'],
            'photo_category' => 'required|in:'.(($photo_categories)?implode(',', $photo_categories):null),
        ];
    }
    public function messages() : array
    {
        return [
            'photo_category.required' => 'Please select one of the category',
            'photo_category.in' => 'Invalid photo category selected.',
            'is_tc_accepted.required' => 'Please check T&C to proceed.',
            'image.max' => 'The image may not be greater than 10 MB.',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}

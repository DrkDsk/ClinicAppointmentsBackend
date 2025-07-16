<?php

namespace App\Http\Requests;

use App\Classes\Const\BodyMeasures;
use App\Classes\Enum\HeightMeasureEnum;
use App\Classes\Enum\WeightMeasureEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePatientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'birthday' => ['required', 'date', 'before:today'],
            'phone_number' => ['required', 'digits:10'],
            'height' => ['nullable', 'numeric', 'min:0.01', 'max:999.99'],
            'weight' => ['nullable', 'numeric', 'min:0.01', 'max:999.99'],
            'height_measure_type' => ['nullable', Rule::in(BodyMeasures::heightMeasureTypes())],
            'weight_measure_type' => ['nullable', Rule::in(BodyMeasures::weightMeasureTypes())],
        ];
    }

    public function prepareForValidation()
    {
        if ($this->has('phone_number')) {
            $this->merge([
                'phone_number' => preg_replace('/\D/', '', $this->input('phone_number')),
            ]);
        }

        $this->merge([
            'height_measure_type' => $this->input('height_measure_type') ?? HeightMeasureEnum::CENTIMETER->value,
            'weight_measure_type' => $this->input('weight_measure_type') ?? WeightMeasureEnum::KILOGRAM->value,
        ]);
    }
}

<?php

namespace App\Http\Requests\Admin\Patient;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePatient extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.patient.edit', $this->patient);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'nss' => ['sometimes', Rule::unique('patients', 'nss')->ignore($this->patient->getKey(), $this->patient->getKeyName()), 'string'],
            'birthdate' => ['sometimes', 'date'],
            'sex' => ['sometimes', 'string'],
            'enabled' => ['sometimes', 'boolean'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}

<?php

namespace App\Http\Requests\Admin\Diagnostico;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDiagnostico extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.diagnostico.edit', $this->diagnostico);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'idCita' => ['sometimes', 'string'],
            'idEnfermedad' => ['sometimes', 'string'],
            'idPruebaLab' => ['sometimes', 'string'],
            'idPruebaMor' => ['sometimes', 'string'],
            'idTratamiento' => ['sometimes', 'string'],
            'detalles' => ['sometimes', 'string'],
            
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

<?php

namespace App\Http\Requests\Admin\Diagnostico;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreDiagnostico extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.diagnostico.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'idCita' => ['required', 'string'],
            'idEnfermedad' => ['required', 'string'],
            'idPruebaLab' => ['required', 'string'],
            'idPruebaMor' => ['required', 'string'],
            'idTratamiento' => ['required', 'string'],
            'detalles' => ['required', 'string'],
            
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

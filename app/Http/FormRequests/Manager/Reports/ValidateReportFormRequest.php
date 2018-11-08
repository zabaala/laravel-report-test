<?php

namespace App\Http\FormRequests\Manager\Reports;

use Illuminate\Foundation\Http\FormRequest;

class ValidateReportFormRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:6',
            'meta_id' => 'required|array'
        ];
    }

    public function messages()
    {
        return [
            'meta_id.required' => 'The meta is required.',
        ];
    }
}

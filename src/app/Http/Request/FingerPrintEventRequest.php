<?php

namespace Rdt\IO\App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class FingerPrintEventRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'token' => 'required',
            'statustemplate' => 'nullable',
            'types' => 'nullable',
            'fingerprint' => 'nullable',
            'photo' => 'nullable'
        ];
    }
}
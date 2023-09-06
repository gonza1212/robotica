<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RobotFormRequest extends FormRequest
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
        if($this->method() == 'post')
            return [
                'name' => ['required',
                            Rule::unique('robots', 'name')->where('school_id', $this->input('school_id')),
                            'min:3',
                            'max:20'],
                'description' => ['nullable', 'min:4', 'max:255'],
                'school_id' => ['required'],
            ];
        else
            return [
                'name' => ['required',
                            Rule::unique('robots', 'name')->ignore($this->robot)->where('school_id', $this->input('school_id'))->where('id', $this->input('id')),
                            'min:3',
                            'max:20'],
                'description' => ['nullable', 'min:4', 'max:255'],
                'school_id' => ['required'],
            ];
    }
}

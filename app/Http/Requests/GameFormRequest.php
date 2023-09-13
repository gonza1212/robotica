<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameFormRequest extends FormRequest
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
        return [
            'local_id' => ['required', 'numeric', 'min:1'],
            'visitor_id' => ['required', 'numeric', 'min:1'],
            'local_score' => ['required', 'numeric', 'min:0', 'max:99'],
            'visitor_score' => ['required', 'numeric', 'min:0', 'max:99'],
            'finished' => ['required'],
            'start' => ['nullable'],
            'comments' => ['nullable', 'max:255'],
        ];
    }
}

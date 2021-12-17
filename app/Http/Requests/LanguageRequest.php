<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'abbr' => 'required|string|max:10',
            
            'direction' => 'required|in:ltr,rtl'
        ];
    }


    public function messages()
    {
        return 
        [
            'required' => 'هذا الحقل مطلوب',
            'in' => 'القيمة المدخله غير صحيح',
            'name.string' => 'الإسم يجب أن يكون حروف',
            'name.max' => 'الأسم يجب أن لا يزيد على 100 حرف',
            'abbr.required' => 'هذا الحقل مطلوب',
            'abbr.max' => 'هذا الحقل يجب أن لا يزيد على 10 ',
            
        ];
    }
}



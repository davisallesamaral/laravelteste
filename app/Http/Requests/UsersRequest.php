<?php
namespace estoque\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UsersRequest extends FormRequest
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
           'name' => 'required|max:100',
           'email' => 'required|max:255',
           'password' => 'required|max:255'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'The :attribute field can not be empty.',
            'name.required' => 'The :attribute field can not be empty. Atenção!',
        ];
    }
}
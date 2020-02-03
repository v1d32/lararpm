<?php
namespace App\Http\Requests\Teller;

use Illuminate\Foundation\Http\FormRequest;

class StoreMembershipRequest extends FormRequest
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
            "residental_num" => "required|unique:members|max:16",
            "name" => "required",
            "address" => "required",
            "birth_date" => "required"
        ];
    }

}

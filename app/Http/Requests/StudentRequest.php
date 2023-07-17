<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rule = [];
        //laasy ra các phương thức đang hoạt động
        $currentAction = $this->route()->getActionMethod();
        // dd($currentAction);
        switch($this->method()): //lay ra phuong thuc post hoac get
            case 'POST' :  // chay vao POST
                switch($currentAction) :
                    case 'addStudent':
                        $rule = [
                            "email"=>"required|email|unique:studentss",
                            "name"=>"required",
                            "image"=>"required|image|mimes:jpeg,jpg,png|max:5120",
                            // "address"=>"required",
                            // "date_of_birth"=>"required"
                        ];
                        break;
                    endswitch;
        endswitch;
        return $rule;
        
    }
    public function messages(){
        return[
            "email.required"=>'Nhập đúng email hộ cái',
            "name.required"=>'Bắt buộc nhập tên nhé',
            "email.unique"=>'email khummm dc trùng nha ahihihihi......'
        ];
    }
}

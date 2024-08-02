<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        // Bài 1
        // return [
        //     // 'email' => 'required|email|exists:users,email',
        //     // 'password' => 'required|min:8' 
            
            // 'name' => 'required|max:100',
            // 'email'=> 'required|email|uniqe:users, email',
            // 'password' => 'required|min:8|confrimed'

        // ];

        // Bài 2
        // return [
        //     'email' => 'required|email|unique:users,email,' .$this->userId,
        //     'age' => 'nullable|min:18|max:100|integer',
        //     'avatar' => 'nullable|file|mimes:jpeg, png, jpg|max:2048'
        // ];

        // Bài 3
        // return [
        //     'is_shipping_address_same' => 'required|boolean',
        //     'shipping_address' => 'required_if:is_shipping_address_same,true'
        // ];

        // Bài 4

        // return [

        //     'user_id' => 'required|exists:users,id',
        //     'vote_star' => 'required|integer|min:1|max:5',
        //     'feedback' => 'required|string|min:50|max:500'
        // ];

        // Bài 5
        // return [
        //     'name' => 'required|string|min:5|max:20',
        //     'birth_day' => 'required|date_format:d/m/Y',
        //     'province' => 'string|nullable',
        //     'district' => 'required_with:province|string'
        // ];

        // BÀi 6
        return [
            // 'username' => 'required|unique:users, username',
            // 'phone_number' => 'nullable|reqex:^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$'
        ];

    }

    // public $userId;
    // public function setUserId($userId){
    //     $this->userId = $userId;
    // }

    public function messages(): array{

        return [
            // 'name.required' => 'Name không được để trống',
            // 'name.max' => 'Name quá dài',
            // 'email.required'=> 'Email không được để trống',
            // 'email.email' => 'Email không đúng định dạng',
            // 'email.exists' => 'Email chưa được đăng ký',
            // 'password.required'=> 'Password không được để trống',
            // 'password.min' => 'Password quá ngắn'
        ];
    }
    
}

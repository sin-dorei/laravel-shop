<?php

namespace App\Http\Requests;

class UserAddressRequest extends Request
{
    public function rules(): array
    {
        return [
            'province'      => 'required',
            'city'          => 'required',
            'district'      => 'required',
            'address'       => 'required',
            'zipcode'           => 'required',
            'contact_name'  => 'required',
            'contact_phone' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'province'      => '省',
            'city'          => '城市',
            'district'      => '地区',
            'address'       => '详细地址',
            'zipcode'           => '邮编',
            'contact_name'  => '姓名',
            'contact_phone' => '电话',
        ];
    }
}

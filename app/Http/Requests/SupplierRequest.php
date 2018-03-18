<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'nama_supplier'=>'required|unique',
            'no_hp'=>'required',
            'alamat'=>'required',
        ];
    }

    public function messages(){
        return [
        'nama_supplier.required'=>'nama tidak boleh kosong',
        'nama_supplier.unique'=>'nama sudah terpakai',
        'no_hp.required'=>'no hp harus diisi',
        'alamat.required'=>'alamat harus diisi',
        ];
    } 
}

<?php

namespace App\Http\Requests\Admin\Utility;

use Illuminate\Foundation\Http\FormRequest;

class BaseAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
}

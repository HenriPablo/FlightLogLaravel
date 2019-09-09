<?php
/**
 * Created by IntelliJ IDEA.
 * User: tbrymora
 * Date: 8/23/2018
 * Time: 11:08 AM
 */

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\AircraftClass;

class CreateAircraftClassRequest extends FormRequest
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
        return AircraftClass::$rules;
    }
}

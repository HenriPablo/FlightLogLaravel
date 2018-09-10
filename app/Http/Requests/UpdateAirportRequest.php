<?php
/**
 * Created by IntelliJ IDEA.
 * User: tbrymora
 * Date: 8/23/2018
 * Time: 11:09 AM
 */

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Airport;

class UpdateAirportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Airport::$rules;
    }
}

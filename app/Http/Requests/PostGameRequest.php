<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostGameRequest extends FormRequest
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
          'gametitle' => 'required|max:30',
          'gamedate' => 'required',
          'gametype' => 'required',
          'place' => 'required',
          'team1' => 'required',
          'team2' => 'required',
          'gamedirection' => 'required',
        ];
    }
}

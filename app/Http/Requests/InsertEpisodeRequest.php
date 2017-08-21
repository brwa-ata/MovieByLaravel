<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InsertEpisodeRequest extends Request
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
            'episode_name' => 'required' ,
            'episode_number' => 'required' ,
            'language_name' => 'required' ,
            'released_date' => 'required' ,
            'episode_revenue' => 'required' ,
            'episode_budget' => 'required' ,
            'duration' => 'required' ,
            'image' => 'required' ,
            'episode_overview' => 'required'
        ];
    }
}

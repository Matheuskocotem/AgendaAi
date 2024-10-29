<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id', 
            'room_id' => 'required|exists:rooms,id', 
            'start_time' => 'required|date|after_or_equal:now',
            'end_time' => 'required|date|after:start_time'
        ];
    }
}

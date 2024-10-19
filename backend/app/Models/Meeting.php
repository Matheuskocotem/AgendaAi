<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'room_id', 'start_time', 'end_time'];

    // Um agendamento pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Um agendamento pertence a uma sala
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

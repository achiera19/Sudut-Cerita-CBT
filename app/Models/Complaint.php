<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function responses()
    {
        return $this->hasMany(ComplaintResponse::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function followUps()
    {
        return $this->hasMany(FollowUp::class);
    }
}

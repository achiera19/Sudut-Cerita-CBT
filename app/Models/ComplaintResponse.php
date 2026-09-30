<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintResponse extends Model
{
    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public function counselor()
    {
        return $this->belongsTo(User::class, 'counselor_id');
    }
}

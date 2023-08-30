<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestTimestamp extends Model
{
    use HasFactory;

    protected $fillable = ['work_timestamp_id', 'started_at', 'ended_at'];

    public function workTimestamp()
    {
        return $this->belongsTo(WorkTimestamp::class);
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTimestamp extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'started_at', 'ended_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ビュー仕様にデータを加工
    public function getStartedAtAttribute($value)
    {
        return Carbon::parse($value)->format('H:i:s');
    }

    public function getEndedAtAttribute($value)
    {
        return Carbon::parse($value)->format('H:i:s');
    }

    // 勤務時間の計算
    public function getWorkingHoursAttribute()
    {
        return (strtotime($this->ended_at) - strtotime($this->started_at))/3600;
    }

    protected $appends = ['working_hours'];
}
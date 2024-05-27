<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrMentoringSchedule extends Model
{
    use HasFactory;

    protected $table = 'trmentoringschedule';
    protected $primaryKey = 'TrMentoringScheduleId';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'TrMentoringScheduleId',
        'IsDone',
        'MeetingTime',
        'MeetingLink',
        'MentorReview',
        'MenteeReview',
        'MenteeUserId',
        'MentorUserId',
        'UniqueCode',
        'SubjectId',
        'SpecificTopic'
    ];

    protected $casts = [
        'IsDone' => 'boolean',
        'MeetingTime' => 'datetime',
    ];
}

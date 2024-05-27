<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsSubject extends Model
{
    use HasFactory;

    protected $table = 'mssubject';
    protected $primaryKey = 'SubjectId';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'SubjectId',
        'SubjectName',
    ];
}

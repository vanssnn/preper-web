<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsUser extends Model
{
    use HasFactory;

    protected $table = 'msuser';
    protected $primaryKey = 'UserId';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'UserId',
        'UserName',
        'UserPhoneNumber',
        'IsValid',
        'RoleId',
        'SubjectId',
    ];
}

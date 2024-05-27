<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsRole extends Model
{
    use HasFactory;

    protected $table = 'msrole';
    protected $primaryKey = 'RoleId';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'RoleId',
        'RoleName',
    ];
}

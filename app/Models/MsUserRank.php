<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsUserRank extends Model
{
    use HasFactory;

    protected $table = 'msuserrank';
    protected $primaryKey = 'UserRankId';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'UserRankId',
        'UserRankName',
    ];
}

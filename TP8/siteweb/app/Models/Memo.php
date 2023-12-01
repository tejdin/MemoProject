<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    protected $table = 'memos';
    // disable timestamps

    // belongsToUser
    public function user()
    {
        return $this->belongsTo(MyUser::class, 'username', 'username');
    }

}

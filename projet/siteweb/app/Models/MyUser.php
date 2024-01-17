<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MyUser extends Model
{

    use HasFactory;

    protected $table = 'myusers';
    // disable timestamps
    public $timestamps = false;

    //hasmanymemos
    public function memos()
    {

        return $this->hasMany(Memo::class, 'username', 'username');
    }

}

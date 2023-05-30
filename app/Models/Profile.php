<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model{
    use HasFactory;

    protected $guarded = [];

    //Llink the profile table to user the table | Profile #belong to user
    public function user(){
        return $this->belongsTo(User::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model{
    use HasFactory;

    protected $guarded = [];

    public function profileImage(){
        $folderDir = "/storage/";
        $imagePath = ($this->image) ? $folderDir . $this->image : 'https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg';
        return $imagePath;
    }

    //Llink the profile table to user the table | Profile #belong to user
    public function user(){
        return $this->belongsTo(User::class);
    }

}

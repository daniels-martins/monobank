<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // relationships
    public function owner()
    {   
        return $this->belongsTo(User::class);
    }

    public function getFullName()
    {
        return ucwords("$this->fname  $this->lname");
    }
}

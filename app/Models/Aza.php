<?php

namespace App\Models;

use App\Models\AzaType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aza extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    protected $table = 'aza' ;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getOwner()
    {
    //    return $this->user->name;
       return $this->user->profile->getFullName();
    }

    public function getType()
    {
        return ucfirst(AzaType::find($this->aza_type_id)->name);
    }
}

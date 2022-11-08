<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;


    
    protected $primaryKey='comId';
       protected $fillable = [
        
        'fullName',
        'Email',
        'Message'
    ];
   
    public function customers()
    {
        return $this->belongsToMany(comment::class, 'customer_comment');
    }
}

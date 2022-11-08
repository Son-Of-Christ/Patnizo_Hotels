<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $primaryKey='BookId';
    
       protected $fillable = [
        
        'startDate',
        'endDate',
        'whatBooked',
        'Telephone',
        'amountTopay'
    ];
   
    

 


public function customers()
{

return $this->belongsToMany(customers::class,'customer_booking');

}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tour_service extends Model
{
    use HasFactory;

    protected $primaryKey='tourId';
    
    protected $fillable = [
     
     'startDate',
     'endDate',
     'location',
     'amountTopay'
 ];




    public function customers()
    { 
    
 return $this->belongsToMany(customers::class, 'customer_tour_service');
    
   }
}

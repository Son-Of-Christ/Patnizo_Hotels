<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;

    protected $primaryKey='customerId';
    
   
    

    protected $fillable = [
        
        'FirstName',
        'LastName',
        'Email',
        'Telephone',
        'Password'   
    ];





    public function payment()
    {
        return $this->hasMany(payment::class);
    
    }

 public function tour_service()
    {
        return $this->belongsToMany(tour_service::class, 'customer_tour_service');
    }

    public function booking()
    {
        return $this->belongsToMany(booking::class,'customer_booking');
    }
    public function comment()
    {
        return $this->belongsToMany(comment::class,'customer_comment');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;


    protected $primaryKey='	payId';
       protected $fillable = [
        
        'payment_for',
        'Amount',
        'pay_Id'
    ];

    public function customers(){
        return $this->belongsTo(customers::class);
           }

}

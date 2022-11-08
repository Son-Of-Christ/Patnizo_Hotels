<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    
   protected $primaryKey='userId';
   protected $fillable = [
       'userName',
       'email',
       'roles_Id',
   ];

  
   protected $hidden = [
       'password',
       'remember_token',
   ];

   
   protected $casts = [
       'email_verified_at' => 'datetime',
   ];

   public function roles(){
       return $this->hasMany(roles::class);
          }


}

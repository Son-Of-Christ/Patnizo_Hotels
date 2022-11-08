<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    use HasFactory;



    protected $primaryKey='permissionId';
    protected $fillable = [
     
     'name'
 ];
    public function roles()
{

return $this->belongsToMany(roles::class,'permission_roles');

}
    protected $guarded=[];
    

}

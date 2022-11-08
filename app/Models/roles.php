<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;

    protected $primaryKey='rolesId';
    protected $fillable = [
     
     'name'
 ];



    protected $guarded=[];

    public function permissions()
{
    

return $this->belongsToMany(permissions::class,'permission_roles');

}

public function users()
    {
        return $this->belongsTo(users::class);
    
    }
// ,'permission_role'
    
}

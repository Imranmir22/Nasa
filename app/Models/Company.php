<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    use HasFactory;
    protected $fillable=['name','email','logo','website'];
    function departments()
    {
        return $this->hasManyThrough(Employee::class, Department::class); //specify the name of target
                                                                        //ist and then intermediate class
    }
    function company_departments()
    {
        return $this->hasMany(Department::class); //specify the name of target
                                                                        //ist and then intermediate class
    }
 
}

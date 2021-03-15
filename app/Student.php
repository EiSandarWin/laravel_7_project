<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
class Student extends Model
{
    
    protected $table='students';
    	protected $fillable = [
    	'name' ,'parent_name', 'branch_name', 'signature' 
    ];
}

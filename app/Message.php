<?php

namespace App;


use App\Model\Employee;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['receiver','employee_id','subject','message','created_at'];
   
    public function MsgName()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
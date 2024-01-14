<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = ['name','email','phone','pincode', 'address', 'total', 'payment_method', 'qty'];

}
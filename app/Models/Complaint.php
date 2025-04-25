<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable=[
        'customer_name','phone_email','content','type','user_id','car_id','approvd'
    ];
    public function user(){
        return $this->belongsTo(User::class);

    }

    public function car(){
        return $this->belongsTo(Car::class);
    }

    public function isApproved(){
        return $this->approved;
    }

    }


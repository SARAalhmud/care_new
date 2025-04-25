<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name' ,
        'Hit',
        'ad_url',
        'image',
        'location',
        'start_date',
        'end_date',
        'approved',

    'phone_number'];
}

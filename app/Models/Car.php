<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\complaints;


class Car extends Model
{
    //
    use HasFactory;
    protected $fillable=[
        'user_id',
        'brand',
        'year',
        'price',
        'model',
        'car_images','description','sold','color','country','city',   'show_complaints',
        'speed',
        'fuel_type',
    ];
    protected $casts = [
        'car_images' => 'array',  // علشان يتعامل مع الصور كمصفوفة
        'sold' => 'boolean',
    ];

    public static function rules(){
        return [
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',  // إذا كنت تحتاجين حقل الموديل
            'year'  => 'required|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'sold' => 'boolean',
            'show_complaints' => 'boolean',
            'car_images' => 'required|array|max:3',
            'car_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
'speed' => 'nullable|integer|min:0',
'fuel_type' => 'nullable|string',
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function complaints(){
        return $this->hasMany(Complaint::class);
    }
}

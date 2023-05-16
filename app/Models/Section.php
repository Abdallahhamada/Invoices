<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'section_name',
        'description',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    ###################start relation #######################

    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    ###################end relation #########################

    ###################start relation #######################

    public function product(){
        return $this->hasMany(Product::class,'section_id','id');
    }

    ###################end relation #########################
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mockery\Undefined;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'due_date',
        'section_id',
        'product',
        'amount_collection',
        'amount_commission',
        'discount',
        'rate_vat',
        'value_vat',
        'total',
        'note',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
    ###################start relation #######################

    public function section(){
        return $this->belongsTo(Section::class,'section_id','id');
    }

    ###################end relation #########################

    public function getStatusAttribute($value){
        return ($value == 1 ? __('invoices.paied'): ($value == 2 ? __('invoices.partialy paied'): __('invoices.unpaied')));
    }

    public function getDiscountAttribute($value){
        return $value == '' ? __('invoices.no discount'): $value ;
    }

    public function getNoteAttribute($value){
        return $value == '' ? __('invoices.no notes'): $value ;
    }
}

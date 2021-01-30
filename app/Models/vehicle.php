<?php

namespace App\Models;

use App\Models\Municipality;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table="vehicles";
    protected $fillable=["plate","brand","model","color","onwer","CI"];
    
    public function municipality(){
        return $this->belongsTo(Municipality::class);
    }
}

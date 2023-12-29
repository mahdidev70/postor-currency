<?php

namespace PostorShop\CurrencyModules\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $table = 'currency_currencies';

    protected $guarded = ['id'];
}
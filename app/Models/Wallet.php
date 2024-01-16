<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model {

    use HasFactory;

    protected $table = 'wallet';

    protected $fillable = [
        'id_user',
        'id_product',
        'name',
        'token',
        'status',
        'value',
        'value_profitability',
        'date_output',
        'invest_output',
    ];
}

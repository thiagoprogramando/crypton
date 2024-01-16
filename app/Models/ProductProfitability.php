<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProfitability extends Model {

    use HasFactory;

    protected $table = 'produc_profitability';

    protected $fillable = [
        'id_product',
        'dateProfitability',
        'process',
        'percentage',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'id_product');
    }
}

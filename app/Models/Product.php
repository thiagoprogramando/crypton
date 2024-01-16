<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'description',
        'terms',
        'min_profitability',
        'max_profitability',
        'min_value',
        'max_value',
        'days_output',
        'invest_output',
    ];

    public function profitabilities() {
        return $this->hasMany(ProductProfitability::class, 'id_product');
    }
    
    public function lastEarningPercentage($year = null) {
        
        $query = ProductProfitability::where('id_product', $this->id);
        if ($year) {
            $query->whereYear('dateProfitability', $year);
        }

        $lastEarning = $query->latest('dateProfitability')->first();

        return $lastEarning ? $lastEarning->percentage : null;
    }

    public function maxProfitabilityPercentage($year = null) {
        
        $query = ProductProfitability::where('id_product', $this->id);
        if ($year) {
            $query->whereYear('dateProfitability', $year);
        }
        $maxPercentage = $query->max('percentage');

        return $maxPercentage;
    }

    public function wallets() {
        return $this->hasMany(Wallet::class, 'id_product');
    }

    public function withdraws() {
        return $this->hasMany(Withdraw::class, 'id_product');
    }

    public function countWallets() {
        
        return $this->wallets()->count();
    }

    public function totalWallets($year = null) {
        
        $query = $this->wallets();
        if ($year) {
            $query->whereYear('date_output', $year);
        }

        return $query->sum('value');
    }

    public function totalWalletProfitability($year = null) {
        
        $query = $this->wallets();
        if ($year) {
            $query->whereYear('date_output', $year);
        }

        return $query->sum('value_profitability');
    }

    public function totalValue($year = null) {

        $sum = $this->totalWalletProfitability($year) + $this->totalWallets($year);
        return $sum;
    }

    public function minPayment($year = null) {
        
        $totalValue = $this->totalWallets($year);
        $minProfitability = $this->min_profitability;
        $payment = $totalValue * ($minProfitability / 100);

        return $payment;
    }

    public function countWithdraws($year = null) {

        $query = $this->withdraws();
        if ($year) {
            $query->whereYear('data_output', $year);
        }

        return $query->count();
    }
}

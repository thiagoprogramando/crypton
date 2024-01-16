<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model {

    use HasFactory;

    protected $table = 'withdraw';

    protected $fillable = [
        'id_user',
        'id_wallet',
        'name',
        'token',
        'status',
        'value',
        'data_output',
    ];

    public function wallet() {
        return $this->belongsTo(Wallet::class, 'id_wallet');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function getStatusAttribute($value) {
        switch ($value) {
            case 'APPROVED':
                return 'Aprovado';
            case 'PENDENT':
                return 'Pendente';
            case 'DENIED_WITHDRAWAL_UNAVAILABLE':
                return 'Indisponível para saque';
            default:
                return $value;
        }
    }
}

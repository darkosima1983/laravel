<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class ExchangeRates extends Model
{
    const CURREENCY_CHF = 'CHF';
    const CURREENCY_USD = 'USD';

    const AVAILABLE_CURRENCIES = [
        self::CURREENCY_CHF,
        self::CURREENCY_USD,
    ];
    protected $table = 'exchange_rates';

    protected $fillable = [
        'currency',
        'value',
    ];

    public static function getCurrencyForToday($currency)
    {
        return self::where('currency', $currency)
            ->whereDate('created_at', Carbon::now())
            ->first();
    }
}

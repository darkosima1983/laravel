<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\ExchangeRates;
use Carbon\Carbon;
class GetEurRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rates:get-eur';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get EUR exchange rates for CHF and USD';

    /**
     * Execute the console command.
     */
    public function handle()
    {
      




        foreach (ExchangeRates::AVAILABLE_CURRENCIES as $currency) {
            
            $todayCurrency = ExchangeRates::getCurrencyForToday($currency);
            
            if ($todayCurrency != null) {
               
                continue;
            }
            
            $response = Http::get(env('FRANKFURTER_API_URL'), [
                'from' => 'EUR',
                'to'   => $currency,
            ]);

            ExchangeRates::create([
                'currency' => $currency,
                'value' => $response->json("rates.$currency"),
            ]);
        }

        $this->info('Exchange rates updated successfully.');
    }
}

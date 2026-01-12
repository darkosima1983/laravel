<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

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
        $response = Http::get(env('FRANKFURTER_API_URL'), [
            'from' => 'EUR',
            'to'   => 'CHF,USD',
        ]);

        if ($response->failed()) {
            $this->error('Failed to fetch rates from API');
            return 1;
        }

        $data = $response->json();

        $eurToChf = $data['rates']['CHF'] ?? null;
        $eurToUsd = $data['rates']['USD'] ?? null;

        $this->info('EUR → CHF: ' . $eurToChf);
        $this->info('EUR → USD: ' . $eurToUsd);

        return 0;
    }
}

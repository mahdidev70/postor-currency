<?php

namespace PostorShop\CurrencyModules\app\Console\Commands;

use App\Models\Stock;
use Illuminate\Console\Command;
use PostorShop\CurrencyModules\app\Models\Currency;

class UpdateProductCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-product-currency {key}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $key = $this->argument('key');

        $currency = Currency::where('key', $key)->first();
        $stocks = Stock::where('currency', $key)->whereNotNull('currency_price')->get();

        foreach($stocks as $stock)
        {
            $price = $currency->price * $stock->currency_price;
            Stock::where('id', $stock->id)
            ->update([
                'price' => $price
            ]);
        }
    }
}

<?php

namespace PostorShop\CurrencyModules\app\Repositories;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use PostorShop\CurrencyModules\app\Models\Currency;
use App\Repositories\V1\Interfaces\SettingRepositoryInterface;
use App\Repositories\V1\Interfaces\CategoryRepositoryInterface;
use PostorShop\CurrencyModules\app\Repositories\Interfaces\CurrencyRepositoryInterface;


class CurrencyRepository implements CurrencyRepositoryInterface
{
    private SettingRepositoryInterface $settingRepository;
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function all()
    {
        return Category::get();
    }

    public function index()
    {
        return Currency::paginate();
    }

    public function store($request)
    {
        return Currency::create($request);
    }

    public function edit($request)
    {
        return Currency::find($request);
    }

    public function update($request)
    {
        return Currency::where('id', $request['id'])
            ->update($request);
    }

    public function delete($request)
    {
        // $currency = Currency::find($request);
        // Stock::where('currency', $currency->key)->update(
        //     [
        //         'currency' => null,
        //         'currency_price' => null
        //     ]
        // );
        return Currency::where('id', $request['id'])
            ->delete();
    }

}

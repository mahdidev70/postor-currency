<?php

namespace PostorShop\CurrencyModules\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\CurrencyStoreRequest;
use App\Http\Requests\Admin\CurrencyUpdateRequest;
use App\Http\Requests\Admin\CurrencyUpdateActionRequest;
use App\Repositories\V1\Interfaces\SettingRepositoryInterface;
use PostorShop\CurrencyModules\app\Repositories\Interfaces\CurrencyRepositoryInterface;

class CurrencyController extends Controller
{
    private CurrencyRepositoryInterface $repository;
    private SettingRepositoryInterface $settingRepository;

    public function __construct(
        CurrencyRepositoryInterface $repository,
        SettingRepositoryInterface $settingRepository
    ) {
        $this->repository = $repository;
        $this->settingRepository = $settingRepository;
    }

    public function index()
    {
        $currencies = $this->repository->index();
        return view('admin.pages.currency.index', compact('currencies'));
    }

    public function create()
    {
        return view('admin.pages.currency.create');
    }

    public function store(CurrencyStoreRequest $request)
    {
        $data = $this->repository->store($request->only(
            'title',
            'key',
            'price'
        ));
        Alert::success(__('messages.success'), __('messages.success-store'));
        return redirect(route('currency.index'));
    }

    public function edit($id)
    {
        $data = $this->repository->edit($id);
        return view('admin.pages.currency.edit', compact('data'));
    }

    public function update(CurrencyUpdateRequest $request)
    {
        $data = $this->repository->update($request->only(
            'id',
            'title',
            'key',
            'price'
        ));
        if ($data) {
            Alert::success(__('messages.success'), __('messages.success-update'));
            return redirect(route('currency.index'));
        } else {
            Alert::error(__('messages.error'), __('messages.error-update'));
            return back();
        }
    }

    public function delete(Request $request)
    {
        $data = $this->repository->delete($request);
        if ($data) {
            Alert::success(__('messages.success'), __('messages.success-delete'));
        } else {
            Alert::error(__('messages.error'), __('messages.error-delete'));
        }
        return back();
    }

    public function updateProductPrice(CurrencyUpdateActionRequest $request)
    {
        Artisan::call('app:update-product-currency', ['key' => $request['key']]);
        Alert::success(__('messages.success'), __('messages.success-action'));
        return back();
    }
}

<?php

namespace PostorShop\CurrencyModules\app\Repositories\Interfaces;

interface CurrencyRepositoryInterface
{
    // public function all();
    public function index();
    public function store($request);
    public function edit($request);
    public function update($request);
    public function delete($request);
    // public function getSubCategory($request);
    // public function getLastLevels();
    // public function getParentLevels();
    // public function getBySlug($slug);
    // public function getSubCategoriesId($parentIds);
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private $repository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->repository = $cityRepository;
    }

    public function index()
    {
        $cities = $this->repository->paginate(2);
        return view('Admin.city.index', [
            'cities' => $cities,
        ]);
    }

    public function create()
    {
        return view('Admin.city.createOrEdit');
    }

    public function store(CityRequest $request)
    {
        $city = $this->repository->create($request->city);
        $city->downtown()->create($request->downtown);

        return redirect()->route('city.index')->with('success', 'Saved successfully');
    }

    public function edit(City $city)
    {
        return view('Admin.city.createOrEdit', compact('city'));
    }

    public function update(CityRequest $request, City $city)
    {
        $this->repository->update($city, $request->city);
        $city->downtown->update($request->downtown);

        return redirect()->route('city.index')->with('success', 'Edited successfully');
    }

    public function destroy(City $city)
    {
        $this->repository->delete($city);
        return redirect()->route('city.index')->with('success', 'Deleted successfully');
    }

}

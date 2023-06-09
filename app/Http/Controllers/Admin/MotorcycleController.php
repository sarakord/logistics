<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MotorcycleRequest;
use App\Models\Motorcycle;
use App\Repositories\MotorcycleRepository;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    private $repository;

    public function __construct(MotorcycleRepository $motorcycleRepository)
    {
        $this->repository = $motorcycleRepository;
    }

    public function index()
    {
        $motorcycles = $this->repository->paginate(5);
        return view('Admin.motorcycle.index', [
            'motorcycles' => $motorcycles,
        ]);
    }

    public function create()
    {
        return view('Admin.motorcycle.createOrEdit');
    }

    public function store(MotorcycleRequest $request)
    {
        $city = $this->repository->create($request->all());

        return redirect()->route('motorcycle.index')->with('success', 'Saved successfully');
    }

    public function edit(Motorcycle $motorcycle)
    {
        return view('Admin.motorcycle.createOrEdit', compact('motorcycle'));
    }

    public function update(MotorcycleRequest $request, Motorcycle $motorcycle)
    {
        $this->repository->update($motorcycle, $request->all());

        return redirect()->route('motorcycle.index')->with('success', 'Edited successfully');
    }

    public function destroy(Motorcycle $motorcycle)
    {
        $this->repository->delete($motorcycle);
        return redirect()->route('motorcycle.index')->with('success', 'Deleted successfully');
    }
}

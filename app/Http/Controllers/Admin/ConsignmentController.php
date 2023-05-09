<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsignmentRequest;
use App\Models\Consignment;
use App\Models\Motorcycle;
use App\Repositories\ConsignmentRepository;
use Illuminate\Http\Request;

class ConsignmentController extends Controller
{
    private $repository;

    public function __construct(ConsignmentRepository $consignmentRepository)
    {
        $this->repository = $consignmentRepository;
    }

    public function index()
    {
        $consignments = $this->repository->paginate(5);
        return view('Admin.consignment.index', [
            'consignments' => $consignments,
        ]);
    }

    public function create()
    {
        return view('Admin.consignment.createOrEdit');
    }

    public function edit(Consignment $consignment)
    {
        $motorcycles = Motorcycle::active()->where('city_id', $consignment->customer?->city_id)->get();
        return view('Admin.consignment.createOrEdit', compact('consignment', 'motorcycles'));
    }

    public function update(ConsignmentRequest $request, Consignment $consignment)
    {
        $this->repository->update($consignment, $request->all());

        return redirect()->route('consignment.index')->with('success', 'Edited successfully');
    }

    public function destroy(Consignment $consignment)
    {
        $this->repository->delete($consignment);
        return redirect()->route('consignment.index')->with('success', 'Deleted successfully');
    }
}

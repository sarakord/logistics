<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\City;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function index()
    {
        $users = $this->repository->paginate(5);
        return view('Admin.user.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        $cities = City::active()->get();
        return view('Admin.user.createOrEdit', ['cities' => $cities]);
    }

    public function store(UserRequest $request)
    {
        $city = $this->repository->create($request->all());

        return redirect()->route('user.index')->with('success', 'Saved successfully');
    }

    public function edit(User $user)
    {
        $cities = City::active()->get();
        return view('Admin.user.createOrEdit', compact('user', 'cities'));
    }

    public function update(UserRequest $request, User $user)
    {
        if (!$request->filled('password')) {
            $request->request->remove('password');
        }
        $this->repository->update($user, $request->all());

        return redirect()->route('user.index')->with('success', 'Edited successfully');
    }

    public function destroy(User $user)
    {
        $this->repository->delete($user);
        return redirect()->route('user.index')->with('success', 'Deleted successfully');
    }
}

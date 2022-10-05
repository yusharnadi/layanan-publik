<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\DepartmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct(private UserService $userService, private DepartmentService $departmentService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('read user')) abort(403);

        $users = $this->userService->findAllWithDepartment();
        // dd($users);

        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('create user')) abort(403);

        $departments = $this->departmentService->findAll();
        $roles = Role::pluck('name')->all();
        return view('user.create', ['roles' => $roles, 'departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        if (!Auth::user()->can('create user')) abort(403);

        $validRequest = $request->safe()->except(['_token']);
        $validRequest['password'] = Hash::make($validRequest['password']);
        // dd($validRequest);
        try {
            $this->userService->insert($validRequest);
            return redirect()->route('users.index')->with('message', "User berhasil dibuat.");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['request' => $validRequest]);
            return redirect()->route('users.index')->with('error', "User gagal dibuat.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        if (!Auth::user()->can('update user')) abort(403);

        $user = $this->userService->findById($id);

        $roles = Role::pluck('name')->all();
        $role = $user->getRoleNames();

        $departments = $this->departmentService->findAll();


        return view('user.edit', ['user' => $user, 'roles' => $roles, 'role' => $role, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        if (!Auth::user()->can('update user')) abort(403);

        $validRequest = $request->safe()->except(['_token', 'role']);

        if ($request->has('password') && $request->password != '') {
            $validRequest['password'] = Hash::make($validRequest['password']);
        }

        // dd($validRequest);

        try {
            $this->userService->update($id, $validRequest, $request->role);
            return redirect()->route('users.index')->with('message', "User berhasil diubah.");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['request' => $validRequest]);
            return redirect()->route('users.index')->with('error', "User gagal diubah.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(int $id)
    {
        if (!Auth::user()->can('delete user')) abort(403);

        try {
            $this->userService->delete($id);
            return redirect()->route('users.index')->with('message', "User berhasil dihapus.");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['user_id' => $id]);
            return redirect()->route('users.index')->with('error', "User gagal dihapus.");
        }
    }
}

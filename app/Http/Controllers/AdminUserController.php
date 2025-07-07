<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Role;
use App\Models\Show;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{

    public function dashboard()
    {
        return redirect()->route('users.index');
    }

    public function managerRequests()
    {
        return view('admin.manager-requests', [
            'users' => User::where('wants_manager', 1)
                        ->orderBy('created_at', 'desc')
                        ->get(),
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $attr = $request->validate([
            'accepted' => ['required', 'boolean'],
        ]);

        if ($attr['accepted']) {
            $user->role_id = Role::firstWhere('code', Role::MANAGER_CODE)->id;
        }
        $user->wants_manager = false;
        $user->save();

        return redirect()->route('users.manager-requests')->with([
            'flash' => 'success',
            'message' => 'Updated user status successfully.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with([
            'flash' => 'success',
            'message' => 'Successfully deleted user.',
        ]);
    }
}

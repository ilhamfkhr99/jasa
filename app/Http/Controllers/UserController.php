<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Foundation\Auth;
// use session_name;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::paginate(10);
        return view('users/index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string',
            // 'email'         => 'required|email|unique:users,email|string',
            'email'         => 'required|email|string',
            'password'      => 'required|min:8|string',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('users/index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'          => 'required|string',
            'email'         => 'required|email|string',
            'password'      => 'required|min:8|string',
        ]);

        User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('users/index');
    }
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('users/index');
    }
}

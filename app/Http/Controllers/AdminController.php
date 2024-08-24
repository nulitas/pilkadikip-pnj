<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle the login process.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);


        $admin = Admin::where('username', $request->input('username'))->first();

        if ($admin && Hash::check($request->input('password'), $admin->password)) {

            session(['admin_logged_in' => true, 'admin_id' => $admin->id, 'admin_username' => $admin->username]);

            return redirect()->route('admin.dashboard');
        } else {

            return back()->withErrors([
                'username' => 'Invalid username or password.',
            ])->withInput();
        }
    }

    /**
     * Logout the admin.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        session()->flush();

        return redirect()->route('admin.login');
    }
}

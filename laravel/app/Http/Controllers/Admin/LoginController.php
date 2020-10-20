<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {

	use AuthenticatesUsers;

	protected $redirectTo = '/admin/index';

	public function __construct() {
		$this->middleware('guest:admin')->except('logout');
	}

	public function showLogin() {
		return view('admin.login');
	}

	public function guard() {
		return Auth::guard('admin');
	}

	public function logout(Request $request) {
		Auth::guard('admin')->logout();
		return redirect('admin/login');
	}
}

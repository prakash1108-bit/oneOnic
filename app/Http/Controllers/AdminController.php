<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function createAdmin()
    {
        $data['name'] = 'Admin';
        $data['email'] = 'admin@admin.com';
        $data['password'] = Hash::make('123456');
        $user = User::create($data);
        return redirect()->route('loginView');
    }
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect()->route('index');
        }
        return view('login');
    }
    public function login(Request $request)
    {
        $cred = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($cred)) {
            return redirect()->route('index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function index()
    {
     $categories = Category::get();
     $subcategories = Subcategory::get();
     $product = Product::get();
     return view('index',compact('categories','subcategories','product'));   
    }
}

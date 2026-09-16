<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class authController extends Controller
{
    //
function dashboard()
    {
        // $users = User::all();
        // $categories = Category::all();
        // $products = Product::all();

        $userCount = User::count();
        $categoryCount = Category::count();
        $productCount = Product::count();
        $latestProducts = Product::latest()->take(5)->get();

        return view('dashboard', compact('userCount', 'categoryCount', 'productCount', 'latestProducts'));
    }
    }


<?php

namespace App\Http\Controllers\Middleware;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product() {
        return view('product');
    } 
    
    public function addproduct() {
        return view('addproduct');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSalesController extends Controller
{
    //

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Sales - Online Store";
        return view('admin.products.sales')->with("viewData", $viewData);
    }
    
}

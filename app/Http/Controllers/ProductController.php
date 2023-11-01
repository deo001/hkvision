<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    // public static $products = [
    //     ["id"=>"1", "name"=>"camera", "description"=>"HIKVISION ", "image" => "hk1.jpg", "price"=>"1000"],
    //     ["id"=>"2", "name"=>"camera", "description"=>"HIKVISION", "image" => "hk2.jpg", "price"=>"999"],
    //     ["id"=>"3", "name"=>"camera", "description"=>"HIKVISION", "image" => "hk3.jpg", "price"=>"30"],
    // ];

    // for purchase we check if the user is authenticated and catch the details 
    public function purchase(Request $request)
    {
        $productInSession = $request->session()->get("products");
        if($productInSession){
            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setUserId($userId);
            $order->setTotal(0);
            $order->save();


            $total = 0;
            $productInCart = Product::findMany(array_keys($productInSession));
            
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $item = new Item();
                $item->setQuantity($quantity);
                $item->setPrice($product->getPrice());
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($product->getPrice()*$quantity);
                }

                $order->setTotal($total);
                $order->save();

                $newBalance = Auth::user()->getBalance() - $total;
                Auth::user()->setBalance($newBalance);
                Auth::user()->save();

                
                $request->session()->forget('products');

                $viewData = [];
                $viewData["title"] = "Purchase - Online Store";
                $viewData["subtitle"] = "Purchase Status";
                $viewData["order"] = $order;
                return view('cart.purchase')->with("viewData", $viewData);
            } else {
                return redirect()->route('cart.index');
            }
    }
       
      
    
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product->getName()." - Online Store";
        $viewData["subtitle"] = $product->getName()." - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }
}
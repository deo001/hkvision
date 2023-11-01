<?php
namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        $viewData["products"] = Product::all();
        return view('admin.products.index')->with("viewData", $viewData);
    }

   
        // it starts with validation 
        public function store(Request $request)
        {
            Product::validate($request);
            // $request->validate([
            // "name" => "required|max:255",
            // "description" => "required",
            // "price" => "required|numeric|gt:0",
            // 'image' => 'image',
            // ]);


            $newProduct = new Product();
            $newProduct->setName($request->input('name'));
            $newProduct->setDescription($request->input('description'));
            $newProduct->setPrice($request->input('price'));
            $newProduct->setImage("game.png");
            $newProduct->save();

            // image uoload
            if ($request->hasFile('image')) {
                $imageName = $newProduct->getId().".".$request->file('image')->extension();
                Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
                );
                $newProduct->setImage($imageName);
                $newProduct->save();
                }
                

            return back();
        }

        // function for delete 
        public function delete($id)
        {
            Product::destroy($id);
            return back();
        }

        //function for edit
        public function edit($id)
        {
            $viewData = [];
            $viewData["title"] = "Admin Page - Edit Product";
            $viewData["product"] = Product::findOrFail($id);
            return view('admin.products.edit')->with("viewData",$viewData);
        }

        //function for update
        public function update(Request $request,$id)
        {
            Product::validate($request);
            // $request->validate([
            //     "name" => "required|max:255",
            //     "description" => "required",
            //     "price" => "required|numeric|gt:0",
            //     "image" =>'image'

            // ]);

            $product=Product::findOrFail($id);
            $product->setName($request->input('name'));
            $product->setDescription($request->input('description'));
            $product->setPrice($request->input('price'));

            if ($request->hasFile('image')) {
                    $imageName = $product->getId().".".$request->file('image')->extension();
                    Storage::disk('public')->put(
                    $imageName,
                    file_get_contents($request->file('image')->getRealPath())
                    );
                    $product->setImage($imageName);
                }

                $product->save();
                return redirect()->route('admin.product.index');
        }
                

}
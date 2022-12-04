<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ImageCrud;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ImageCrudController extends Controller
{
    public function all_product()
    {
        $products = ImageCrud::all();
        return view("products", compact("products"));
    }
    public function add_new_product()
    {
        return view("add_new_product");
    }
    public function store_product(Request $request)
    {

        $request->validate([
            "name" => "required",
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        $imageName = "";
        if ($image = $request->file("image")) {
            $imageName = time() . "-" . uniqid() . "." . $image->getClientOriginalExtension();
            $image->move("image/products", $imageName);
        }

        ImageCrud::create([
            "name" => $request->name,
            "image" => $imageName,
        ]);

        Session::flash("msg", "Product Added SuccessFully");
        return redirect()->back();
    }

    public function edit_product($id)
    {
        $product = ImageCrud::findOrFail($id);
        return view("edit_product", compact("product"));
    }

    public function update_product(Request $request, $id)
    {

        $product = ImageCrud::findOrFail($id);
        $request->validate([
            "name" => "required",

        ]);

        $imageName = "";
        $deleteOldImage = "image/products/" . $product->image;

        if ($image = $request->file("image")) {
            if (file_exists($deleteOldImage)) {

                File::delete($deleteOldImage);
            }
            $imageName = time() . "-" . uniqid() . "." . $image->getClientOriginalExtension();
            $image->move("image/products", $imageName);
        } else {
            $imageName = $product->image;

        }

        ImageCrud::where("id", $id)->update([
            "name" => $request->name,
            "image" => $imageName,
        ]);

        Session::flash("msg", "Product Update SuccessFully");
        return redirect()->back();
    }
    public function delete_product($id)
    {
        $product = ImageCrud::findOrFail($id);
        $deleteOldImage = "image/products/" . $product->image;
        if (file_exists($deleteOldImage)) {

            File::delete($deleteOldImage);
        }

        $product->delete();
        Session::flash("msg", "Product Deleted SuccessFully");
        return redirect()->back();
    }
}

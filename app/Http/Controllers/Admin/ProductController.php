<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subcategory;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status_products','!=','2')->get();
        return view('admin.collection.product.index', compact('products'));
    }

    public function create()
    {
        $subcategory = Subcategory::where('status','!=','2')->get();
        return view('admin.collection.product.create', compact('subcategory'));
    }

    public function store(Request $request)
    {
        $products = new Product();
        $products->name = $request->input('name');
        $products->sub_category_id = $request->input('sub_category_id');
        $products->url = $request->input('url');
        $products->small_description = $request->input('small_description');

        //image save code 
        if($request->hasFile('image'))
        {
            $image_file = $request->file('image');
            $img_ext =  $image_file->getClientOriginalExtension();
            $img_filename = time() . '.' . $img_ext;
            $image_file->move('uploads/productImage/', $img_filename);
            $products->image = $img_filename;
        }

        $products->original_price = $request->input('original_price');
        $products->offer_price = $request->input('offer_price');
        $products->quantity = $request->input('quantity');
        $products->priority = $request->input('priority');

        $products->p_high_heading = $request->input('p_high_heading');
        $products->p_highlights = $request->input('p_highlights');
        $products->p_des_heading = $request->input('p_des_heading');
        $products->p_description = $request->input('p_description');
        $products->p_det_heading = $request->input('p_det_heading');
        $products->p_details = $request->input('p_details');

        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keyword = $request->input('meta_keyword');

        $products->new_arrival_products = $request->input('new_arrival_products') == true ?'1':'0';
        $products->featured_products = $request->input('featured_products') == true ?'1':'0';
        $products->popular_products = $request->input('popular_products') == true ?'1':'0';
        $products->offers_products = $request->input('offers_products') == true ?'1':'0';
        $products->status_products = $request->input('status_products') == true ?'1':'0';
        $products->save();
        return redirect()
                ->back()
                    ->with('status',"Products Saved Successfully");

    }
}

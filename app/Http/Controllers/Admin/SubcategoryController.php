<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use File;

class SubcategoryController extends Controller
{
    public function index()
    {
        $category = Category::where('status','!=','2')->get();
        $subcategory = Subcategory::where('status','!=','2')->get(); // 3 is Deleted record
        return view('admin.collection.subcategory.index', compact('subcategory','category'));
    }

    public function store(Request $request)
    {
        $subcategory = new Subcategory();
        $subcategory->category_id = $request->input('category_id');
        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');
        //image save code 
        if($request->hasFile('image'))
        {
            $image_file = $request->file('image');
            $img_ext =  $image_file->getClientOriginalExtension();
            $img_filename = time() . '.' . $img_ext;
            $image_file->move('uploads/subcategoryImage/', $img_filename);
            $subcategory->image = $img_filename;
        }

        $subcategory->priority = $request->input('priority');
        $subcategory->status = $request->input('status') == true ? '1' : '0';
        $subcategory->save();
        return redirect()
                    ->back()
                        ->with('status', "Sub Category Add Successfully");
    }

    public function edit($id)
    {
        $category = Category::where('status','!=','2')->get();
        $subcategory = Subcategory::find($id);
        return view('admin.collection.subcategory.edit', compact('category','subcategory'));
    }

    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->category_id = $request->input('category_id');
        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');
        //image save code 
        if($request->hasFile('image'))
        {

            $filepath_image = 'uploads/subcategoryImage/'.$subcategory->image;
            if(File::exists($filepath_image))
            {
                File::delete($filepath_image);
            }
            else 
            {
                $image_file = $request->file('image');
                $img_ext =  $image_file->getClientOriginalExtension();
                $img_filename = time() . '.' . $img_ext;
                $image_file->move('uploads/subcategoryImage/', $img_filename);
                $subcategory->image = $img_filename;
            }
        }

        $subcategory->priority = $request->input('priority');
        $subcategory->status = $request->input('status') == true ? '1' : '0';
        $subcategory->update();
        return redirect('sub-category')
                    ->with('status', "Sub Category Add Successfully");
    }

    public function delete($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->status = "2";
        $subcategory->update();
        return redirect()
                ->back()
                    ->with('status', "Sub Category Deleted Successfully");
    }
}

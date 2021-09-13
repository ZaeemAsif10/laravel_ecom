<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Groups;
use App\Models\Category;
use File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::where('status','!=','2')->get();
        return view('admin.collection.category.index', compact('category'));
    }

    public function create()
    {
        $group = Groups::where('status','!=','2')->get();
        return view('admin.collection.category.create', compact('group'));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->group_id = $request->input('group_id');
        $category->name = $request->input('name');
        $category->description = $request->input('description');

        //image save code 
        if($request->hasFile('category_img'))
        {
            $image_file = $request->file('category_img');
            $img_ext =  $image_file->getClientOriginalExtension();
            $img_filename = time() . '.' . $img_ext;
            $image_file->move('uploads/categoryImage/', $img_filename);
            $category->image = $img_filename;
        }

        //icon save code 
        // $category->icon = $request->input('category_icon');
        if($request->hasFile('category_icon'))
        {
            $icon_file = $request->file('category_icon');
            $icon_ext =  $icon_file->getClientOriginalExtension();
            $icon_filename = time() . '.' . $icon_ext;
            $icon_file->move('uploads/categoryicon/', $icon_filename);
            $category->icon = $icon_filename;
        }

        $category->status = $request->input('status') == true ? '1' : '0';
        $category->save();
        return redirect()
                ->back()
                    ->with('status', "Categroy Added Successfully");
    }

    public function edit($id)
    {
        $group = Groups::where('status','!=','2')->get();
        $category = Category::find($id);
        return view('admin.collection.category.edit', compact('group','category'));
    }

    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->group_id = $request->input('group_id');
        $category->name = $request->input('name');
        $category->description = $request->input('description');

        //image save code 
        if($request->hasFile('category_img'))
        {
            $filepath_image = 'uploads/categoryImage/'.$category->image;
            if(File::exists($filepath_image))
            {
                File::delete($filepath_image);
            }
            else
            {
                $image_file = $request->file('category_img');
                $img_ext =  $image_file->getClientOriginalExtension();
                $img_filename = time() . '.' . $img_ext;
                $image_file->move('uploads/categoryImage/', $img_filename);
                $category->image = $img_filename;
            }
        }

        //icon save code 
        if($request->hasFile('category_icon'))
        {
            $filepath_icon = 'uploads/categoryicon/'.$category->icon;
            if(File::exists($filepath_icon))
            {
                File::delete($filepath_icon);
            }
            else
            {
                $icon_file = $request->file('category_icon');
                $icon_ext =  $icon_file->getClientOriginalExtension();
                $icon_filename = time() . '.' . $icon_ext;
                $icon_file->move('uploads/categoryicon/', $icon_filename);
                $category->icon = $icon_filename;
            }
        }

        $category->status = $request->input('status') == true ? '1' : '0';
        $category->update();
        return redirect()
                ->back()
                    ->with('status', "Categroy Updated Successfully");
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->status = "2";
        $category->update();
        return redirect()
                ->back()
                    ->with('status', "Categroy Deleted Successfully");

    }

    public function deletedrecord()
    {
        $category = Category::where('status','2')->get();
        return view('admin.collection.category.deleted', compact('category'));
    }

    public function restorecategoryrecord($id)
    {
        $category = Category::find($id);
        $category->status = "0";
        $category->update();
        return redirect('category')
                ->with('status', "Categroy Restore Successfully");
    }
}

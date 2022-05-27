<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function index() {
        return view('admin.categories.index', [
            'category' => Category::all()
        ]);
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {

        $category = new Category();
        if($request->hasFile('image'))
        {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('image/category/',$filename);
        $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->deskripsi = $request->input('deskripsi');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_deskripsi = $request->input('meta_deskripsi');
        $category->meta_keyword = $request->input('meta_keyword');
        $category->save();
        return redirect('/category')->with('status','Category Has Been Added');
    }

    public function edit($id) {

        return view('admin.categories.edit', [
            'category' => Category::find($id)
        ]);
    }

    public function update(Request $request, $id) {
       $category = Category::find($id);
       if($request->hasFile('image'))
       {
           $path = 'image/category/'.$category->image;
           if(File::exists($path))
           {
               File::delete($path);
           }
           $file = $request->file('image');
           $ext = $file->getClientOriginalExtension();
           $filename = time().'.'. $ext;
           $file->move('image/category/', $filename);
           $category->image = $filename;
       }
       $category->name = $request->input('name');
       $category->slug = $request->input('slug');
       $category->deskripsi = $request->input('deskripsi');
       $category->status = $request->input('status') == TRUE ? '1':'0';
       $category->popular = $request->input('popular') == TRUE ? '1':'0';
       $category->meta_title = $request->input('meta_title');
       $category->meta_deskripsi = $request->input('meta_deskripsi');
       $category->meta_keyword = $request->input('meta_keyword');
       $category->update();
       return redirect('/category')->with('status','Category Has Been Updated');
    }

    public function destroy($id) {
        $category = Category::find($id);
        if($category->image)
        {
            $path = 'image/category/'. $category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('/category')->with('status', 'Category Has Been Deleted');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // menampilkan halaman index pada kategori
    public function index(){
        $categories = Category::all();
        return view('pages.categories.index', compact('categories'));
    }

    // menampilkan halaman penambahan kategori
    public function create(){
        return view('pages.categories.create');
    }

    // mengontrol menampilkan halaman store tangkap dan tampung input dari user
    public function store(Request $request){
        $validatedData = $request->validate([
            "name"=>"required|unique:categories,name",
        ], [
            "name.required"=>"Nama Kategori harus diisi!",
            "name.unique"=>"Nama kategori sudah ada!",
        ]);

        $category = new Category();
        $category->name  = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        return redirect('/categories');
    }

    // menampilkan halaman edit di kategori
    public function edit($id){
        $category = Category::find($id);
        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            "name"=>"required|unique:categories,name",
        ], [
            "name.required"=>"Nama Kategori harus diisi!",
            "name.unique"=>"Nama kategori sudah ada!",
        ]);

        $category = Category::find($id);
        $category->name  = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();
        
        return redirect('/categories');
    }

    // menampilkan halaman delete di kategori
    public function delete($id){
        Category::where('id', $id)->delete();
        
        return redirect('/categories');
        // $category = Category::find($id);
        // return view('pages.categories.delete', compact('category'));
    }
}

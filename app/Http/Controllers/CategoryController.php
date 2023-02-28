<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public $category;
    public function index()
    {
        return view('admin.category.category',[
            'categories' => Category::all(),
        ]);
    }

    public function addCategory(Request $request)
    {
        Category::saveCategory($request);
        return back();
    }

    public function updateCategory($id)
    {
        $this->category = Category::find($id);
        return view('admin.category.category-update',[
            'categories' => $this->category,
        ]);
    }

    public function categoryUpdateForm(Request $request)
    {
        $this->category = Category::find($request->c_id);
        $this->category->category_name = $request->category_name;
        $this->category->save();
        return redirect(route('category'));
    }

    public function categoryDelete(Request $request)
    {
        $this->category = Category::find($request->category_id);
        $this->category->delete();
        return back();
    }
}

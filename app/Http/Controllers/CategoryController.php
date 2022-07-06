<?php

namespace App\Http\Controllers;

use App\Models\Category as ModelsCategory;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category/index', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $category = new category();
        $category->name = $request->name;
        $category->save();

        return redirect('category/index');
    }

    public function update(Request $request)
    {
        Category::where('id', $request->id)
        ->update([
            'name' => $request->name
        ]);

        return redirect('category/index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('category/index');
    }
}

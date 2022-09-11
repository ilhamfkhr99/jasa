<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Content;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        return view('category/index', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $category       = new category();
        $category->name = $request->name;
        $category->save();

        // return redirect('category/index')->with('toast_success', 'Data Berhasil Ditambahkan!');
        toast('Data Berhasil Ditambahkan!','success');
        return redirect('category/index');
    }

    public function show($id)
    {
        $category   = Category::where('id', $id)->first();
        $abouts     = About::where('category_id', $id)->paginate(5);
        return view('abouts/index', compact('category', 'abouts', 'id'));
    }

    public function about_store(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image:jpeg,png,jpg',
            'desc'  => 'required',
        ]);

        $abouts              = new About();
        $abouts->title       = $request->title;
        $abouts->category_id = $id;

        if($request->hasFile('image'))
        {
            $image         = $request->image;
            $fileimage     = $image->getClientOriginalName();
            // $nama_image = date('YmdHis') . ".$fileimage";
            $upload_path   = 'about_image';
            $image->move($upload_path, $fileimage);

            $abouts->image = $fileimage;
        }

        // $abouts->image = $fileimage;
        $abouts->desc = $request->desc;
        $abouts->save();

        toast('Data Berhasil Ditambahkan!','success');
        return redirect('category/'.$id.'/abouts-index');
    }

    public function about_update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image:jpeg,png,jpg',
            'desc'  => 'required',
        ]);

        if($request->hasFile('image'))
        {
            $image       = $request->image;
            $fileimage   = $image->getClientOriginalName();
            // $nama_image = date('YmdHis') . ".$fileimage";
            $upload_path = 'about_image';
            $image->move($upload_path, $fileimage);

            About::where('id', $request->id)
            ->update([
                'title' => $request->title,
                'category_id' => $id,
                'image' => $fileimage,
                'desc' => $request->desc,
            ]);

            toast('Data Berhasil Diubah!','info');
            return redirect('category/'.$id.'/abouts-index');
        }else{
            About::where('id', $request->id)
            ->update([
                'title' => $request->title,
                'category_id' => $id,
                'desc' => $request->desc,
            ]);

            toast('Data Berhasil Diubah!','info');
            return redirect('category/'.$id.'/abouts-index');
        }
    }

    public function about_destroy($id, $about_id)
    {
        $abouts = About::where('id', $about_id)->first();
        $abouts->delete($id);

        toast('Data Berhasil Dihapus!','warning');
        return redirect('category/'.$id.'/abouts-index');
    }

    public function update(Request $request)
    {
        Category::where('id', $request->id)
        ->update([
            'name' => $request->name
        ]);

        toast('Data Berhasil Diubah!','info');
        return redirect('category/index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        toast('Data Berhasil Dihapus!','warning');
        return redirect('category/index');
    }
}

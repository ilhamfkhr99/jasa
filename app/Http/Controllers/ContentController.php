<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Parser\Multiple;

class ContentController extends Controller
{
    public function index()
    {
        // $contents = Content::all();
        $contents = Content::paginate(10);
        $categories = Category::all();
        $files = File::all();
        return view('contents/index', compact('contents', 'categories', 'files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'image.*' => 'image:jpeg,png,jpg'
        ]);
        $contents               = new Content();
        $contents->category_id  = $request->category_id;
        $contents->title        = $request->title;
        $contents->desc         = $request->desc;
        $contents->save();

        if ($request->hasFile('image')) {

            foreach ($request['image'] as $file) {
                $fileimage   = $file->getClientOriginalName();
                // $nama_image = date('YmdHis') . ".$fileimage";
                $upload_path = 'images';
                $file->move($upload_path, $fileimage);

                $file = new File();
                $file->content_id = $contents->id;
                $file->image = $fileimage;
                $file->save();
            }
        }
        toast('Data Berhasil Ditambahkan!','success');
        return redirect('contents/index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            // 'image' => 'image:jpeg,png,jpg|max:2048'
            'image.*' => 'image:jpeg,png,jpg'
        ]);
        // if($request->hasFile('file_image'))
        $contents = Content::where('id', $request->id)->first();
        // if ($request->hasFile('image')) {
            // $contents = new Content();

            Content::where('id', $request->id)
                ->update([
                    'category_id' => $request->category_id,
                    'title' => $request->title,
                    'desc' => $request->desc,
                ]);
            if ($request->hasFile('image')) {
                foreach($request['image'] as $file)
                {

                    $fileimage   = $file->getClientOriginalExtension();
                    // $nama_image = date('YmdHis') . ".$fileimage";
                    $upload_path = 'images';
                    $file->move($upload_path, $fileimage);

                    File::where('id', $request->id)
                        ->update([
                            'content_id' => $contents->id,
                            'image' => $fileimage
                        ]);
                }

                toast('Data Berhasil Diubah!','info');
                return redirect('contents/index');
            } else {

                Content::where('id', $request->id)
                    ->update([
                        'category_id' => $request->category_id,
                        'title' => $request->title,
                        'desc' => $request->desc,
                    ]);

                toast('Data Berhasil Diubah!','info');
                return redirect('contents/index');
        }
    }
    public function destroy($id)
    {
        $contents = Content::find($id);
        $contents->delete();

        toast('Data Berhasil Dihapus!','warning');
        return redirect('contents/index');
    }
}

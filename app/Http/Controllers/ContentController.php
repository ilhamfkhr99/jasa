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
        $contents = Content::all();
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
                $fileimage   = $file->getClientOriginalExtension();
                $nama_image = date('YmdHis') . ".$fileimage";
                $upload_path = 'images';
                $file->move($upload_path, $nama_image);

                $file = new File();
                $file->content_id = $contents->id;
                $file->image = $nama_image;
                $file->save();
            }
        }

        return redirect('contents/index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            // 'image' => 'image:jpeg,png,jpg|max:2048'
        ]);
        // if($request->hasFile('file_image'))
        if ($request->hasFile('image')) {

            $file_image  = $request->image;
            $fileimage   = $file_image->getClientOriginalExtension();
            $nama_image = date('YmdHis') . ".$fileimage";
            $upload_path = 'images';
            $file_image->move($upload_path, $nama_image);
            e;
            // $files->update();
            $contents = Content::where('id', $request->id)->first();
            Content::where('id', $request->id)
                ->update([
                    'category_id' => $request->category_id,
                    'title' => $request->title,
                    'desc' => $request->desc,
                ]);

            File::where('content_id', $contents->id)
                ->update([
                    'content_id' => $contents->id,
                    'image' => $nama_image
                ]);
            return redirect('contents/index');
        } else {
            // $contents = Content::where('id', $request->id)->first();

            // $contents = new Content();
            // $contents->category_id = $request->category_id;
            // $contents->title = $request->title;
            // $contents->desc = $request->desc;
            // $contents->update();

            Content::where('id', $request->id)
                ->update([
                    'title' => $request->title,
                    'desc' => $request->desc,
                ]);
            return redirect('contents/index');
        }
    }
    public function destroy($id)
    {
        $contents = Content::find($id);
        $contents->delete();
        return redirect('contents/index');
    }
}

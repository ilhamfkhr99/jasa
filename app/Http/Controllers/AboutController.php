<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::paginate(10);
        return view('abouts/index', compact('abouts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required'
        ]);

        $abouts = new About();
        $abouts->content_id = $request->content_id;
        $abouts->title = $request->title;
        $abouts->desc = $request->desc;
        $abouts->save();

        return redirect('abouts/index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required'
        ]);

        About::where('id', $request->id)
        ->update([
            'title' => $request->title
        ]);
    }
}

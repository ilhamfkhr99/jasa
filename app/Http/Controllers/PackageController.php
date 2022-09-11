<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Package_detail;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        // $packages = Package::with('package_details')->paginate(10);
        // $packages = Package_detail::with('package')->get();
        // $packages = Package::all();
        // dd($packages);
        $packages = Package::paginate(10);
        // dd($packages);
        // $details = Package_detail::where('package_id', $request->package_id)->get();
        return view('packages/index', compact('packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'desc.*'  => 'required',
        ]);

        $packages        = new Package();
        $packages->title = $request->title;
        $packages->price = $request->price;
        $packages->save();

        // dd($request->all());
        // foreach($request->desc as $desc)
        // foreach($request['desc'] as $details)
        // {
        //     $detail              = new Package_detail();
        //     $detail->package_id  = $packages->id;
        //     $detail->desc        = $desc;
        //     $detail->save();
        //     Package_detail::create([
        //         'package_id' => $packages->id,
        //         'desc' => $request->desc[$key],
        //     ]);
        // }

        foreach($request['desc'] as $item => $value)
        {
            $data = array(
                'package_id' => $packages->id,
                'desc'       => $request['desc'][$item]
            );
            Package_detail::create($data);
        }
        toast('Data Berhasil Ditambahkan!','success');
        return redirect('packages/index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'desc'  => 'required',
        ]);

        Package::where('id', $request->id)
        ->update([
            'title' => $request->title,
            'price' => $request->price,
            'desc'  => $request->desc,
        ]);

        toast('Data Berhasil Diubah!','info');
        return redirect('packages/index');
    }

    public function destroy($id)
    {
        $packages = Package::find($id);
        $packages->delete();

        toast('Data Berhasil Dihapus!','warning');
        return redirect('packages/index');
    }
}

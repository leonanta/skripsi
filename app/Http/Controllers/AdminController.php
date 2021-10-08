<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\DosenModel;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.index', compact('user'));
    }

    public function viewDosen(){
        $user = Auth::user();
        $data = DosenModel::all();
        return view('admin.dosen.read', compact('data', 'user'));
    }

    public function formAddDosen(){
        $user = Auth::user();
        return view ('admin.dosen.add', compact('user'));
    }

    public function insertDosen(Request $request){
        $dModel = new DosenModel;

        $dModel->nidn = $request->nidn;
        $dModel->name = $request->name;
        $dModel->email = $request->email;

        $dModel->save();

        return redirect('admin/datadosen')->with(['success' => 'Berhasil']);
    }

    public function formEditDosen($id){
        $user = Auth::user();
        $data = DB::table('dosen')
                ->where('nidn', $id)->first();
        return view ('admin.dosen.edit',  compact('data', 'user'));
    }

    public function updateDosen(Request $request, $id){
        $nidn = $request->nidn;
        $name = $request->name;
        $email = $request->email;
        
        $data = DB::table('dosen')
        ->where('nidn', $id)
        ->update(
        ['name' => $name,
        'email' => $email]
        );

        return redirect('admin/dosen/')->with(['success' => 'Berhasil']);
    }

    public function deleteDosen($id){
        $checkout = DB::table('dosen')
        ->where('nidn', $id)->delete();
        
        $data = DB::table('dosen')
                ->where('nidn', $id)->delete();

        return back()->with(['success' => 'Berhasil']);
    }
}

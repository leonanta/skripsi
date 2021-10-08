<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\DosenModel;
use App\MahasiswaModel;

class AdminController extends Controller
{
    //Dashboard
    public function index()
    {
        $user = Auth::user();
        return view('admin.index', compact('user'));
    }

    //Dosen
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

        DB::insert('insert into users (no_induk, name, username, password, role) values (?, ?, ?, ?, ?)', [$request->nidn, $request->name, $request->nidn, Hash::make($request->nidn), 'dosen']);

        return redirect('admin/dosen')->with(['success' => 'Berhasil']);
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

        return redirect('admin/dosen')->with(['success' => 'Berhasil']);
    }
    public function deleteDosen($id){
        $user = DB::table('users')
            ->where('no_induk', $id)->delete();

        $data = DB::table('dosen')
            ->where('nidn', $id)->delete();

        return back()->with(['success' => 'Berhasil']);
    }
    //End Dosen

    //Mahasiswa
    public function viewMahasiswa(){
        $user = Auth::user();
        $data = MahasiswaModel::all();
        return view('admin.mahasiswa.read', compact('data', 'user'));
    }
    public function formAddMahasiswa(){
        $user = Auth::user();
        return view ('admin.mahasiswa.add', compact('user'));
    }
    public function insertMahasiswa(Request $request){
        $mModel = new MahasiswaModel;

        $mModel->nim = $request->nim;
        $mModel->name = $request->name;
        $mModel->email = $request->email;
        $mModel->hp = $request->hp;

        $mModel->save();

        DB::insert('insert into users (no_induk, name, username, password, role) values (?, ?, ?, ?, ?)', [$request->nim, $request->name, $request->nim, Hash::make($request->nim), 'mahasiswa']);

        return redirect('admin/mahasiswa')->with(['success' => 'Berhasil']);
    }
    public function formEditMahasiswa($id){
        $user = Auth::user();
        $data = DB::table('mahasiswa')
                ->where('nim', $id)->first();
        return view ('admin.mahasiswa.edit',  compact('data', 'user'));
    }
    public function updateMahasiswa(Request $request, $id){
        $nim = $request->nim;
        $name = $request->name;
        $email = $request->email;
        $hp = $request->hp;
        
        $data = DB::table('mahasiswa')
        ->where('nim', $id)
        ->update(
        ['name' => $name,
        'email' => $email,
        'hp' => $hp]
        );

        return redirect('admin/mahasiswa')->with(['success' => 'Berhasil']);
    }
    public function deleteMahasiswa($id){
        $user = DB::table('users')
            ->where('no_induk', $id)->delete();
        
        $data = DB::table('mahasiswa')
            ->where('nim', $id)->delete();

        return back()->with(['success' => 'Berhasil']);
    }
    //End Mahasiswa


    //Proposal Plotting
    public function viewProposalPlotting(){
        $user = Auth::user();
        return view('admin.proposal.plotting.read', compact('user'));
    }


    //Proposal Monitoring
    public function viewProposalMonitoring(){
        $user = Auth::user();
        return view('admin.proposal.monitoring.read', compact('user'));
    }


    //Proposal Penjadwalan
    public function viewProposalPenjadwalan(){
        $user = Auth::user();
        return view('admin.proposal.penjadwalan.read', compact('user'));
    }
}

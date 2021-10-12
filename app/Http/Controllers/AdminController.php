<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\DosenModel;
use App\MahasiswaModel;
use App\PlotDosbingModel;
use App\Imports\PlotDosbingImport;
use App\Imports\UserImport;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\ProposalModel;

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
        $data = PlotDosbingModel::all();
        return view('admin.proposal.plotting.read', compact('data', 'user'));
    }

    public function plotDosbingImportExcel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('files',$nama_file);
 
		// import data
		Excel::import(new PlotDosbingImport, public_path('/files/'.$nama_file));
        Excel::import(new UserImport, public_path('/files/'.$nama_file));
        Excel::import(new MahasiswaImport, public_path('/files/'.$nama_file));
 
		return redirect('admin/proposal/plotting')->with(['success' => 'Berhasil']);
	}


    //Proposal Monitoring
    public function viewProposalMonitoring(){
        $user = Auth::user();
        $data = DB::table('proposal')
        ->join('mahasiswa', 'proposal.nim', '=', 'mahasiswa.nim')
        ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
        ->select('proposal.id as id', 'proposal.nim as nim', 'mahasiswa.name as nama', 'proposal.judul as judul', 
        'proposal.proposal as proposal',  'plot_dosbing.dosbing1 as dosbing1', 'plot_dosbing.dosbing2 as dosbing2')
        ->get();
        return view('admin.proposal.monitoring.read', compact('data', 'user'));
    }


    //Proposal Penjadwalan
    public function viewProposalPenjadwalan(){
        $user = Auth::user();
        return view('admin.proposal.penjadwalan.read', compact('user'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\PlotDosbingModel;
use App\MahasiswaModel;
use App\ProposalModel;

class MahasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = PlotDosbingModel::all()->where('nim', $user -> no_induk)->first();
        $mhs = MahasiswaModel::all()->where('nim', $user -> no_induk)->first();
        // dd($mhs[1]);
        return view('mahasiswa.index', compact('data', 'user', 'mhs'));
    }

    public function formEditProfil($id){
        $user = Auth::user();
        $data = DB::table('mahasiswa')
                ->where('nim', $id)->first();
        return view ('mahasiswa.edit',  compact('data', 'user'));
    }
    public function updateProfil(Request $request, $id){
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

        return redirect('mahasiswa')->with(['success' => 'Berhasil']);
    }


    // Proposal
    public function viewPengajuanProposal(){
        $user = Auth::user();
        $data = DB::table('proposal')
        ->where('nim', $user->no_induk)
        ->get();
        return view('mahasiswa.proposal.pengajuan.read', compact('data', 'user'));
    }
    public function formAddProposal(){
        $user = Auth::user();
        $data = PlotDosbingModel::all()->where('nim', $user -> no_induk)->first();
        return view ('mahasiswa.proposal.pengajuan.add', compact('data', 'user'));
    }
    public function insertProposal(Request $request){
        $pModel = new ProposalModel;

        $pModel->nim = $request->nim;
        $pModel->topik = $request->topik;
        $pModel->judul = $request->judul;
        $pModel->id_plot_dosbing = $request->id_plot_dosbing;

		$file = $request->file('proposal');

        $tujuan_upload = 'proposal';

        $file->move($tujuan_upload,$file->getClientOriginalName());

        $pModel->proposal = $file->getClientOriginalName();

        $pModel->save();

        return redirect('mahasiswa/proposal/pengajuan')->with(['success' => 'Berhasil']);
    }
    public function downloadProposal($id)
    {
        $filepath = public_path('proposal/'.$id);
        return Response::download($filepath); 
    }
}

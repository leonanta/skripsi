<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\PlotDosbingModel;
use App\MahasiswaModel;
use App\ProposalModel;
use App\BerkasSemproModel;

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


    // Pengajuan Proposal
    public function viewPengajuanProposal(){
        $user = Auth::user();
        $data = DB::table('proposal')
        ->join('mahasiswa', 'proposal.nim', '=', 'mahasiswa.nim')
        ->select('proposal.id as id', 'proposal.nim as nim', 'proposal.topik as topik', 'proposal.judul as judul', 'proposal.proposal as proposal',
        'proposal.ket1 as ket1', 'proposal.ket2 as ket2', 'mahasiswa.name as name')
        ->where('proposal.nim', $user->no_induk)
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


    ///Daftar Sempro
    public function viewDaftarSempro(){
        $user = Auth::user();
        $data = DB::table('berkas_sempro')
        ->join('mahasiswa', 'berkas_sempro.nim', '=', 'mahasiswa.nim')
        ->join('plot_dosbing', 'berkas_sempro.id_plot_dosbing', '=', 'plot_dosbing.id')
        ->join('proposal', 'berkas_sempro.id_proposal', '=', 'proposal.id')
        ->select('berkas_sempro.id as id', 'berkas_sempro.nim as nim', 'mahasiswa.name as nama', 'mahasiswa.hp as hp', 'proposal.judul as judul', 
        'plot_dosbing.dosbing1 as dosbing1', 'plot_dosbing.dosbing2 as dosbing2' ,'berkas_sempro.berkas_sempro as berkas_sempro')
        ->where('berkas_sempro.nim', $user->no_induk)
        ->where('proposal.ket1', 'ACC')->where('proposal.ket2', 'ACC')
        ->get();
        return view('mahasiswa.proposal.pendaftaran.read', compact('data', 'user'));
    }
    public function formAddSempro(){
        $user = Auth::user();
        $datamhs = MahasiswaModel::all()->where('nim', $user -> no_induk)->first();
        $datadosbing = PlotDosbingModel::all()->where('nim', $user -> no_induk)->first();
        $dataprop = ProposalModel::all()->where('nim', $user -> no_induk)->where('ket1', 'ACC')->where('ket2', 'ACC')->first();
        // dd($dataprop);
        return view ('mahasiswa.proposal.pendaftaran.add', compact('datamhs', 'datadosbing', 'dataprop', 'user'));
    }
    public function insertBerkas(Request $request){
        $bsModel = new BerkasSemproModel;

        $bsModel->nim = $request->nim;
        $bsModel->id_proposal = $request->id_proposal;
        $bsModel->id_plot_dosbing = $request->id_plot_dosbing;

		$file = $request->file('berkas_sempro');

        $tujuan_upload = 'berkas_sempro';

        $file->move($tujuan_upload,$file->getClientOriginalName());

        $bsModel->berkas_sempro = $file->getClientOriginalName();

        $bsModel->save();

        return redirect('mahasiswa/proposal/daftarsempro')->with(['success' => 'Berhasil']);
    }
    public function downloadBerkasSempro($id)
    {
        $filepath = public_path('berkas_sempro/'.$id);
        return Response::download($filepath); 
    }
}

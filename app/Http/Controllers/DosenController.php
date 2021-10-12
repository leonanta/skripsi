<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dosen.index', compact('user'));
    }

    public function viewProposalMahasiswa(){
        $user = Auth::user();
        $dosen = $user -> name;

        $dosbing12 = DB::table('proposal')
        ->join('mahasiswa', 'proposal.nim', '=', 'mahasiswa.nim')
        ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
        ->select('proposal.id as id', 'proposal.nim as nim', 'mahasiswa.name as nama', 'proposal.judul as judul', 
        'proposal.proposal as proposal', 'proposal.ket1 as ket1' ,'proposal.ket2 as ket2')
        ->where('plot_dosbing.dosbing1', $dosen)
        ->orWhere('plot_dosbing.dosbing2', $dosen)
        ->get();

        //option as dosbing 1
        $dosbing1 = DB::table('proposal')
        ->join('mahasiswa', 'proposal.nim', '=', 'mahasiswa.nim')
        ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
        ->select('proposal.id as id', 'proposal.nim as nim', 'mahasiswa.name as nama', 'proposal.judul as judul', 
        'proposal.proposal as proposal', 'proposal.ket1 as ket1')
        ->where('plot_dosbing.dosbing1', $dosen)
        ->get();

        //option as dosbing2
        $dosbing2 = DB::table('proposal')
        ->join('mahasiswa', 'proposal.nim', '=', 'mahasiswa.nim')
        ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
        ->select('proposal.id as id', 'proposal.nim as nim', 'mahasiswa.name as nama', 'proposal.judul as judul', 
        'proposal.proposal as proposal', 'proposal.ket2 as ket2')
        ->where('plot_dosbing.dosbing2', $dosen)
        ->get();

        return view('dosen.monitoring.proposal.read', compact('dosbing1', 'user'));
    }
}

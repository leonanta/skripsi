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

        $dosbing = DB::table('proposal')
            ->join('mahasiswa', 'proposal.nim', '=', 'mahasiswa.nim')
            ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
            ->join('semester', 'proposal.id_semester', '=', 'semester.id')
            ->select('proposal.id as id', 'proposal.nim as nim', 'mahasiswa.name as nama', 'proposal.judul as judul', 
            'proposal.proposal as proposal', 'proposal.ket1 as ket1' ,'proposal.ket2 as ket2', 'proposal.komentar as komentar', 'proposal.komentar1 as komentar1', 'proposal.komentar2 as komentar2', 'semester.semester as semester', 'semester.tahun as tahun',
            'plot_dosbing.dosbing1 as dosbing1', 'plot_dosbing.dosbing2 as dosbing2')
            ->where('plot_dosbing.dosbing1', $dosen)
            ->orWhere('plot_dosbing.dosbing2', $dosen)
            ->get();
        // dd($dosbing);
        return view('dosen.monitoring.proposal.read', compact('dosbing', 'user'));
    }

    public function viewProposalMahasiswaFilter($id){
        $user = Auth::user();
        $dosen = $user -> name;

        if($id==1){
            //option as dosbing 1
            $dosbing = DB::table('proposal')
            ->join('mahasiswa', 'proposal.nim', '=', 'mahasiswa.nim')
            ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
            ->join('semester', 'proposal.id_semester', '=', 'semester.id')
            ->select('proposal.id as id', 'proposal.nim as nim', 'mahasiswa.name as nama', 'proposal.judul as judul', 
            'proposal.proposal as proposal', 'proposal.ket1 as ket1' ,'proposal.ket2 as ket2', 'proposal.komentar as komentar', 'proposal.komentar1 as komentar1', 'proposal.komentar2 as komentar2', 'semester.semester as semester', 'semester.tahun as tahun',
            'plot_dosbing.dosbing1 as dosbing1', 'plot_dosbing.dosbing2 as dosbing2')
            ->where('plot_dosbing.dosbing1', $dosen)
            ->get();
        }else if($id==2){
            //option as dosbing2
            $dosbing = DB::table('proposal')
            ->join('mahasiswa', 'proposal.nim', '=', 'mahasiswa.nim')
            ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
            ->join('semester', 'proposal.id_semester', '=', 'semester.id')
            ->select('proposal.id as id', 'proposal.nim as nim', 'mahasiswa.name as nama', 'proposal.judul as judul', 
            'proposal.proposal as proposal', 'proposal.ket1 as ket1' ,'proposal.ket2 as ket2', 'proposal.komentar as komentar', 'proposal.komentar1 as komentar1', 'proposal.komentar2 as komentar2', 'semester.semester as semester', 'semester.tahun as tahun',
            'plot_dosbing.dosbing1 as dosbing1', 'plot_dosbing.dosbing2 as dosbing2')
            ->where('plot_dosbing.dosbing2', $dosen)
            ->get();
        }else if($id==3){
            $dosbing = DB::table('proposal')
            ->join('mahasiswa', 'proposal.nim', '=', 'mahasiswa.nim')
            ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
            ->join('semester', 'proposal.id_semester', '=', 'semester.id')
            ->select('proposal.id as id', 'proposal.nim as nim', 'mahasiswa.name as nama', 'proposal.judul as judul', 
            'proposal.proposal as proposal', 'proposal.ket1 as ket1' ,'proposal.ket2 as ket2', 'proposal.komentar as komentar', 'proposal.komentar1 as komentar1', 'proposal.komentar2 as komentar2', 'semester.semester as semester', 'semester.tahun as tahun',
            'plot_dosbing.dosbing1 as dosbing1', 'plot_dosbing.dosbing2 as dosbing2')
            ->where('plot_dosbing.dosbing1', $dosen)
            ->orWhere('plot_dosbing.dosbing2', $dosen)
            ->get();
        }else if($id==4){
            $dosbing = DB::table('proposal')
            ->join('mahasiswa', 'proposal.nim', '=', 'mahasiswa.nim')
            ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
            ->join('semester', 'proposal.id_semester', '=', 'semester.id')
            ->select('proposal.id as id', 'proposal.nim as nim', 'mahasiswa.name as nama', 'proposal.judul as judul', 
            'proposal.proposal as proposal', 'proposal.ket1 as ket1' ,'proposal.ket2 as ket2', 'proposal.komentar as komentar', 'proposal.komentar1 as komentar1', 'proposal.komentar2 as komentar2', 'semester.semester as semester', 'semester.tahun as tahun',
            'plot_dosbing.dosbing1 as dosbing1', 'plot_dosbing.dosbing2 as dosbing2')
            ->where(function ($query) {
                $user = Auth::user();
                $dosen = $user -> name;
                $query ->where('plot_dosbing.dosbing1', $dosen)
                       ->where('proposal.ket1', 'Menunggu ACC');
            })
            ->orWhere(function ($query) {
                $user = Auth::user();
                $dosen = $user -> name;
                $query->where('proposal.ket2', 'Menunggu ACC')
                      ->where('plot_dosbing.dosbing2', $dosen);
            })
            ->get();
        }
        return $dosbing;
    }

    //Aksi
    public function accProposalMhs($id){
        $user = Auth::user();
        $dosen = $user -> name;

        $dosen1 = DB::table('proposal')
        ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
        ->select('plot_dosbing.dosbing1 as dosbing1')
        ->where('proposal.id', $id)
        ->first();

        $dosen2 = DB::table('proposal')
        ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
        ->select('plot_dosbing.dosbing2 as dosbing2')
        ->where('proposal.id', $id)
        ->first();
        
        if(($dosen1->dosbing1) == $dosen){
            $data = DB::table('proposal')
            ->where('id', $id)
            ->update(
            ['ket1' => 'ACC']);
        }else if(($dosen2->dosbing2) == $dosen){
            $data = DB::table('proposal')
            ->where('id', $id)
            ->update(
            ['ket2' => 'ACC']);
        }

        return redirect('dosen/monitoring/proposal')->with(['success' => 'Berhasil']);
    }

    public function tolakProposalMhs($id){
        $user = Auth::user();
        $dosen = $user -> name;

        $dosen1 = DB::table('proposal')
        ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
        ->select('plot_dosbing.dosbing1 as dosbing1')
        ->where('proposal.id', $id)
        ->first();

        $dosen2 = DB::table('proposal')
        ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
        ->select('plot_dosbing.dosbing2 as dosbing2')
        ->where('proposal.id', $id)
        ->first();
        
        if(($dosen1->dosbing1) == $dosen){
            $data = DB::table('proposal')
            ->where('id', $id)
            ->update(
            ['ket1' => 'Ditolak']);
        }else if(($dosen2->dosbing2) == $dosen){
            $data = DB::table('proposal')
            ->where('id', $id)
            ->update(
            ['ket2' => 'Ditolak']);
        }

        return redirect('dosen/monitoring/proposal')->with(['success' => 'Berhasil']);
    }

    public function revisiProposalMhs(Request $request, $id){
        $user = Auth::user();
        $dosen = $user -> name;

        $komentar = $request->komentar;

        $dosen1 = DB::table('proposal')
        ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
        ->select('plot_dosbing.dosbing1 as dosbing1')
        ->where('proposal.id', $id)
        ->first();

        $dosen2 = DB::table('proposal')
        ->join('plot_dosbing', 'proposal.id_plot_dosbing', '=', 'plot_dosbing.id')
        ->select('plot_dosbing.dosbing2 as dosbing2')
        ->where('proposal.id', $id)
        ->first();
        
        if(($dosen1->dosbing1) == $dosen){
            $data = DB::table('proposal')
            ->where('id', $id)
            ->update(
            ['ket1' => 'Revisi',
            'komentar1' => $komentar]
            );
        }else if(($dosen2->dosbing2) == $dosen){
            $data = DB::table('proposal')
            ->where('id', $id)
            ->update(
            ['ket2' => 'Revisi',
            'komentar2' => $komentar]
            );
        }

        return redirect('dosen/monitoring/proposal')->with(['success' => 'Berhasil']);
    }

    //Seminar Proposal
    //Jadwal Seminar
    public function viewJadwalSempro(){
        $user = Auth::user();
        $data = DB::table('jadwal_sempro')
        ->join('mahasiswa', 'jadwal_sempro.nim', '=', 'mahasiswa.nim')
        ->join('berkas_sempro', 'jadwal_sempro.id_berkas_sempro', '=', 'berkas_sempro.id')
        ->join('proposal', 'berkas_sempro.id_proposal', '=', 'proposal.id')
        ->join('plot_dosbing', 'berkas_sempro.id_plot_dosbing', '=', 'plot_dosbing.id')
        ->select('jadwal_sempro.id as id', 'jadwal_sempro.nim as nim', 'mahasiswa.name as nama', 'berkas_sempro.id as id_berkas_sempro', 'proposal.judul as judul', 'proposal.proposal as proposal', 
        'plot_dosbing.dosbing1 as dosbing1', 'plot_dosbing.dosbing2 as dosbing2' ,'jadwal_sempro.tanggal as tanggal',
        'jadwal_sempro.jam as jam', 'jadwal_sempro.tempat as tempat', 'jadwal_sempro.ket as ket', 'jadwal_sempro.status as status')
        ->where('plot_dosbing.dosbing1', $user->name)
        ->orWhere('plot_dosbing.dosbing2', $user->name)
        ->get();
        return view('dosen.sempro.read', compact('data', 'user'));
    }
}

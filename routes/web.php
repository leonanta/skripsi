<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
    Route::group(['middleware' => 'admin'], function () {
        //Dashboard
        Route::get('/admin', 'AdminController@index')->name('admin');

        //Semester
        Route::get('/admin/semester', 'AdminController@viewSemester')->name('datasemester');
        Route::get('/admin/semester/edit/{id}', 'AdminController@formEditSemester')->name('formeditsemester');
        Route::put('/admin/semester/{id}', 'AdminController@updateSemester')->name('updatesemester');

        //Dosen
        Route::get('/admin/dosen', 'AdminController@viewDosen')->name('datadosen');
        Route::get('/admin/dosen/tambah', 'AdminController@formAddDosen')->name('formadddosen');
        Route::post('/admin/insertdosen', 'AdminController@insertDosen')->name('insertdosen');
        Route::get('/admin/dosen/edit/{id}', 'AdminController@formEditDosen')->name('formeditdosen');
        Route::put('/admin/dosen/{id}', 'AdminController@updateDosen')->name('updatedosen');
        Route::delete('/admin/dosen/{id}', 'AdminController@deleteDosen')->name('deletedosen');
        //End Dosen

        //Mahasiswa
        Route::get('/admin/mahasiswa', 'AdminController@viewMahasiswa')->name('datamahasiswa');
        Route::get('/admin/mahasiswa/tambah', 'AdminController@formAddMahasiswa')->name('formaddmahasiswa');
        Route::post('/admin/insertmahasiswa', 'AdminController@insertMahasiswa')->name('insertmahasiswa');
        Route::get('/admin/mahasiswa/edit/{id}', 'AdminController@formEditMahasiswa')->name('formeditmahasiswa');
        Route::put('/admin/mahasiswa/{id}', 'AdminController@updateMahasiswa')->name('updatemahasiswa');
        Route::delete('/admin/mahasiswa/{id}', 'AdminController@deleteMahasiswa')->name('deletemahasiswa');
        //End Mahasiswa

        //Proposal Plotting
        Route::get('/admin/proposal/plotting', 'AdminController@viewProposalPlotting')->name('dataproposalplotting');
        Route::post('/admin/plotdosbing/importexcel', 'AdminController@plotDosbingImportExcel')->name('plotdosbingimportexcel');

        //Proposal Monitoring
        Route::get('/admin/proposal/monitoring', 'AdminController@viewProposalMonitoring')->name('dataproposalmonitoring');

        //Proposal Penjadwalan
        Route::get('/admin/proposal/penjadwalan', 'AdminController@viewProposalPenjadwalan')->name('dataproposalpenjadwalan');

        
    });
 
    Route::group(['middleware' => 'dosen'], function () {
        Route::get('/dosen', 'DosenController@index')->name('dosen');

        //Proposal Mahasiswa
        Route::get('/dosen/monitoring/proposal', 'DosenController@viewProposalMahasiswa')->name('dataproposalmahasiswa');

        //Skripsi Mahasiswa
        Route::get('/dosen/monitoring/skripsi', 'DosenController@viewSkripsiMahasiswa')->name('dataksripsimahasiswa');
    });

    Route::group(['middleware' => 'mahasiswa'], function () {
        Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa');

        //Profil
        Route::get('/mahasiswa/edit/{id}', 'MahasiswaController@formEditProfil')->name('formeditprofil');
        Route::put('/mahasiswa/{id}', 'MahasiswaController@updateProfil')->name('updateprofilmhs');

        //Pengajuan Proposal
        Route::get('/mahasiswa/proposal/pengajuan', 'MahasiswaController@viewPengajuanProposal')->name('datapengajuanproposal');
        Route::get('/mahasiswa/proposal/tambah', 'MahasiswaController@formAddProposal')->name('formaddproposal');
        Route::post('/mahasiswa/insertproposal', 'MahasiswaController@insertProposal')->name('insertproposal');
        Route::get('/download/proposal/{id}', 'MahasiswaController@downloadProposal')->name('downloadproposal');

        //Pendaftaran Seminar
        Route::get('/mahasiswa/proposal/daftarsempro', 'MahasiswaController@viewDaftarSempro')->name('datadaftarsempro');
        Route::get('/mahasiswa/proposal/tambahsempro', 'MahasiswaController@formAddSempro')->name('formaddsempro');
        Route::post('/mahasiswa/insertsempro', 'MahasiswaController@insertBerkas')->name('insertsempro');
        Route::get('/download/berkassempro/{id}', 'MahasiswaController@downloadBerkasSempro')->name('downloadberkassempro');

        //Penjadwalan Seminar
        Route::get('/mahasiswa/proposal/jadwalsempro', 'MahasiswaController@viewJadwalSempro')->name('datajadwalsempro');
    });
 
    Route::get('/logout', function() {
        Auth::logout();
        redirect('/');
    })->name('logout');
 
});

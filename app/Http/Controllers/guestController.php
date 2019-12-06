<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\kecamatan;
use App\kelurahan;
use App\laporan;
use App\belanja;
use App\komen;
use Carbon\Carbon;

class guestController extends Controller{
    
    public function home(){
        $view=laporan::WHERE('status',2)->orderBy('created_at','DESC')->get();
        $lihat=komen::orderBy('posttime','asc')->get();
        return view('dashboardGuest',compact('view','lihat'));
    }

    public function profil($id){
        $kecamatan = kecamatan::all();
        $prof= User::where('id',$id);
        return view('profilGuest',compact('kecamatan'));
    }

    public function getKelurahan($id) {
        $kelurahan = kelurahan::where("kecamatan",$id)->pluck("kelurahan","idKelurahan");
        return json_encode($kelurahan);
    }


    public function updateProfil(Request $request){
        $edit=Auth::user();
        $edit->name= $request->name;
        $edit->email= $request->email;
        $kec = $request->kecamatan;
        $kel = $request->kelurahan;
        $ft = $request->file('foto');
        $edit->noKTP= $request->noKTP;

        if ($kec && $kel != null ){
            $edit->kecamatan= $request->kecamatan;
            $edit->kelurahan= $request->kelurahan;

        }

        else if ($ft != null){
            // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
            $file       = $request->file('foto');
            $fileName   = $file->getClientOriginalName();
            $file->move(('image/'),$file->getClientOriginalName());

            $edit->foto= $fileName;
        }

        $edit->noTelepon= $request->noTelepon;
        $edit->save();
        $view=laporan::WHERE('status',2)->orderBy('created_at','DESC')->get();
        return view('dashboardGuest', compact(Auth::user()->id,'view'));
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'alamat'=> 'required|string|max:80',
            'kecamatan'=> 'required',
            'kelurahan'=> 'required',
            'noKTP'=> 'required|string|max:16',
        ]);
    }

    protected function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'alamat' => $data['alamat'],
            'kelurahan' => $data['kelurahan'],
            'kecamatan' => $data['kecamatan'],
            'noKTP' => $data['noKTP'],
            'level' => '3',
        ]);
    }

    public function getRegister(){
        $kecamatan=kecamatan::all();
        return view('auth.register',compact('kecamatan'));
    }

    public function kelurahan($id) {
        $kelurahan = kelurahan::find($id);
        $belanja = belanja::Where('kelurahan',$id)->get();
        $pajakDaerah=kelurahan::where('idKelurahan',$id)->value('pajakDaerah');
        $pendapatan=kelurahan::where('idKelurahan',$id)->value('pendapatan');
        $alokasiDana=kelurahan::where('idKelurahan',$id)->value('alokasiDana');
        $danaDesa=kelurahan::where('idKelurahan',$id)->value('danaDesa');
   
        $totalPendapatan=$pajakDaerah+$pendapatan+$alokasiDana+$danaDesa;
   
        $totalUang=$totalPendapatan;
        $uang=belanja::where('kelurahan',$id)->pluck('belanja');
        $length = count($uang);
   
        for ($i=0;$i<$length;$i++){
            $totalUang-=$uang[$i];
        }
   
        return view('lihatDesaGuest',compact('kelurahan','belanja','totalPendapatan','totalUang'));
    }

    public function laporanSayaGuest($id){
        $view = laporan::where('users',$id)->orderBy('created_at','DESC')->get();
        $lihat=komen::orderBy('posttime','asc')->get();
        return view('laporanSayaGuest',compact('view','lihat'));
    }

    public function buatLaporan($id){
        $kecamatan = kecamatan::all();
        $prof= User::where('id',$id);
        return view('buatLaporanGuest',compact('kecamatan'));
    }

    public function buatLaporanGuest(Request $request){
        $file       = $request->file('foto');
        $fileName   = $file->getClientOriginalName();
        $file->move(('laporan/'),$file->getClientOriginalName());

        $insert = ([
            $today = Carbon::now(),
            'created_at' => $today,
            'updated_at' => $today,
            'laporan' => $request->laporan,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'fotoLaporan' => $request->file('foto')->getClientOriginalName(),
            'status' => '2',
            'users' => Auth::user()->id,

        ]);
        laporan::create($insert);
        $view=laporan::WHERE('status',2)->orderBy('created_at','DESC')->get();
        return view ('dashboardGuest',compact('view'));
    }

    public function editLaporanTamu($id){
        $edit=laporan::find($id);
        $kecamatan = kecamatan::all();

        return view('editLaporanGuest',compact('edit','kecamatan'));
    }

    public function updateLaporanGuest(Request $request,$id){
        $today = Carbon::now();
        $edit=laporan::find($id);
        $edit->laporan= $request->laporan;
        $kec = $request->kecamatan;
        $kel = $request->kelurahan;
        $ft = $request->file('foto');
        if ($ft != null){
            // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
            $fileName   = $ft->getClientOriginalName();
            $ft->move(('laporan/'),$ft->getClientOriginalName());
            $edit->fotoLaporan = $fileName;
        }
        $edit->created_at=$today;

        if ($kec && $kel != null ){
            $edit->kecamatan= $request->kecamatan;
            $edit->kelurahan= $request->kelurahan;

        }
        $edit->save();
        $view=laporan::WHERE('status',2)->orderBy('created_at','DESC')->get();
        return view('dashboardGuest', compact('view'));
    }

    public function deleteLaporanGuest($id){
        $laporan = laporan::where('idLaporan',$id);
        $laporan->delete();
        return redirect()->back();
    }

    public function daftarKadesGuest($id){
        $kades=user::where('level',2)->get();
        $tampils=user::where('level',2)->where('kelurahan',Auth::user()->kelurahan)->get();
        return view('daftarKadesGuest',compact('kades','tampils'));
    }
}

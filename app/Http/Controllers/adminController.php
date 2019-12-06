<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Chat;
use App\kecamatan;
use App\kelurahan;
use App\laporan;
use App\bidang;
use App\belanja;
use Carbon\Carbon;
use App\komen;

class adminController extends Controller{

    public function home(){
        $view=laporan::orderBy('created_at','DESC')->get();
        $lihat=komen::orderBy('posttime','asc')->get();
        return view ('dashboardAdmin', compact('view','lihat'));
    }

    public function lihatLaporan($id){
        $view=laporan::WHERE('users',$id)->orderBy('created_at','DESC')->get();
        $lihat=komen::orderBy('posttime','asc')->get();
        return view('laporanGuest',compact('view','lihat'));
    }

    public function kelurahan2($id) {
        $kelurahan = kelurahan::find($id);
        return view('lihatDesaAdmin',compact('kelurahan'));
    }

    public function index(){
        $kecamatan = kecamatan::all();
        return view('registerKades',compact('kecamatan'));
    }

    public function getKelurahan($id) {
        $kelurahan = kelurahan::where("kecamatan",$id)->pluck("kelurahan","idKelurahan");
        return json_encode($kelurahan);
    }

    public function kelurahanX($id) {
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

        return view('lihatDesaAdmin',compact('kelurahan','belanja','totalPendapatan','totalUang'));
    }

    public function buatKades(Request $request){
        $kecamatan = kecamatan::all();
        return view('registerKades',compact('kecamatan'));
    }

    public function insertKades(Request $request){
        $insert = ([
            $today = Carbon::now(),
            'created_at' => $today,
            'updated_at' => $today,
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'noKTP' => $request->noKTP,
            'password' => bcrypt($request['password']),
            'level' => '2',
        ]);

        User::create($insert);
        $view=laporan::orderBy('created_at','DESC')->get();
        return view ('dashboardAdmin', compact('view'));
    }

    public function profil($id){
        $kecamatan = kecamatan::all();
        $prof= User::where('id',$id);
        return view('profilAdmin',compact('kecamatan'));
    }

    public function buatLaporan($id){
        $kecamatan = kecamatan::all();
        $prof= User::where('id',$id);
        return view('buatLaporanAdmin',compact('kecamatan'));
    }

    public function updateProfilAdmin(Request $request){
        $edit=Auth::user();
        $edit->name= $request->name;
        $edit->email= $request->email;
        $kec = $request->kecamatan;
        $kel = $request->kelurahan;
        $ft = $request->file('foto');
        $edit->noKTP= $request->noKTP;
        $edit->noTelepon= $request->noTelepon;

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

        $edit->save();
        $view=laporan::orderBy('created_at','DESC')->get();
        $view2=bidang::all();
        return view ('dashboardAdmin', compact('view'));
    }
    
    public function daftarKades(Request $request){
		$kades=user::where('level',2)->get();
		return view('daftarKadesAdmin',compact('kades'));
    }
    
    public function daftarUser(Request $request){
        $user=user::where('level',3)->get();
        return view('manageUser',compact('user'));
    }

    public function buatLaporanAdmin(Request $request){
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
            'status' => $request->status,
            'users' => Auth::user()->id,

        ]);

        $view=laporan::orderBy('created_at','DESC')->get();
        $view2=bidang::all();

        laporan::create($insert);
        return view ('dashboardAdmin', compact('view'));
    }

    public function laporanSayaAdmin($id){
        $view = laporan::where('users',$id)->orderBy('created_at','DESC')->get();
        $lihat=komen::orderBy('posttime','asc')->get();
        return view('laporanSayaAdmin',compact('view','lihat'));
    }

    public function editLaporanAdmin($id){
        $edit=laporan::find($id);
        $kecamatan = kecamatan::all();

        return view('editLaporanAdmin',compact('edit','kecamatan'));
    }

    public function updateLaporanAdmin(Request $request,$id){
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

        $statusx=$request->status;

        if ($statusx!=null){
            $edit->status=$request->status;
        }

        $edit->save();
        $view = laporan::where('users',Auth::user()->id)->orderBy('created_at','DESC')->get();
        return view('laporanSayaAdmin',compact('view'));
    }

    public function deleteLaporanAdmin($id){
        $laporan = laporan::where('idLaporan',$id);
        $laporan->delete();
        return redirect()->back();
    }

    public function deleteUser($id){
        $user = User::where('id',$id);
        $user->delete();
        $komen = komen::where('idSender',$id);
        $komen->delete();
        $laporan = laporan::where('users',$id);
        $laporan->delete();
        return redirect()->back();
    }

    public function chat(){
        $chat = Auth::user()->friends();
        return view ('message', compact('chat'));
    }

    public function showChat($id){
        $view=User::WHERE('id',$id)->orderBy('created_at','DESC')->get();
        return view('showMessage', compact('view'));
    }

    public function getChat($id){
        $chats = Chat::where(function ($query) use ($id){
            $query->where('user_id','=',Auth::user()->id)->where('friend_id','=',$id);
        })->orWhere(function ($query) use ($id){
            $query->where('user_id','=',$id)->where('friend_id','=',Auth::user()->id);
        })->get();
        
        return $chats;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use File;
use App\kelurahan;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\kecamatan;
use App\laporan;
use App\belanja;
use App\bidang;
use App\komen;
use Carbon\Carbon;

class kadesController extends Controller{
    public function home(){
        $view=laporan::orderBy('created_at','DESC')->get();
        $lihat=komen::orderBy('posttime','asc')->get();
        return view('dashboardKades',compact('view','lihat'));
    }

    public function daftarLaporan(){
        $view=laporan::join('Users','laporan.Users','=','Users.id')->Where('Users.kelurahan',Auth::user()->kelurahan)->Where('level',3)->orderBy('laporan.created_at','DESC')->get();
        $lihat=komen::orderBy('posttime','asc')->get();
        return view('daftarLaporan',compact('view','lihat'));
    }

    public function profil($id){
        $kecamatan = kecamatan::all();
        $prof= User::where('id',$id);
        return view('/profilKades',compact('kecamatan'));
    }

    public function tentang($id){
        return view('/tentangDesaKades');
    }

    public function updateTentang(Request $request){
        $edit=kelurahan::Where('idKelurahan',Auth::user()->kelurahan)->first();
        $edit->sekdes= $request->sekdes;
        $edit->luas= $request->luas;
        $edit->penduduk= $request->penduduk;
        $edit->utara= $request->utara;
        $edit->selatan= $request->selatan;
        $edit->timur= $request->timur;
        $edit->barat= $request->barat;
        $edit->pajakDaerah= $request->pajakDaerah;
        $edit->pendapatan= $request->pendapatan;
        $edit->alokasiDana= $request->alokasiDana;
        $edit->danaDesa= $request->danaDesa;
        $edit->save();
        return redirect()->back();
    }

    public function updateProfil1(Request $request){
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
        return view('dashboardKades', compact(Auth::user()->id,'view'));
    }

    public function buatLaporan($id){
        $kecamatan = kecamatan::all();
        $prof= User::where('id',$id);
        return view('buatLaporanKades',compact('kecamatan'));
    }

    public function rincianBelanja(){
        $tampil1 = belanja::where('bidang',1)->get();
        $tampil2 = belanja::where('bidang',2)->get();
        $tampil3 = belanja::where('bidang',3)->get();
        $tampil4 = belanja::where('bidang',4)->get();
        return view('rincianBelanjaKades',compact('tampil1','tampil2','tampil3','tampil4'));
    }

    public function tampilBelanja($id){
        return view('buatBelanja');
    }

    public function buatBelanja(Request $request){
        $insert = ([
            $today = Carbon::now(),
            'tanggalBelanja' => $today,
            'rincian' => $request->rincian,
            'kelurahan' => Auth::user()->kelurahan,
            'bidang' =>$request->bidang,
            'belanja' => $request->belanja,

        ]);
        belanja::create($insert);
        return redirect()->back();
    }

    public function editBelanja($id){
        $edit= belanja::find($id);
        return view('ubahBelanja',compact('edit'));
    }

    public function updateBelanja(Request $request, $id){
        $edit = belanja::find($id);
        $edit->rincian = $request->rincian;
        $edit->belanja = $request->belanja;
        $bid = $request->bidang;
        if ($bid != null) {
            $edit->bidang = $request->bidang;
        }
        $edit->save();
        $tampil1 = belanja::where('bidang',1)->get();
        $tampil2 = belanja::where('bidang',2)->get();
        $tampil3 = belanja::where('bidang',3)->get();
        $tampil4 = belanja::where('bidang',4)->get();
        return view('rincianBelanjaKades',compact('tampil1','tampil2','tampil3','tampil4'));
    }

    public function buatLaporanKades(Request $request){
        $file       = $request->file('foto');
        $fileName   = $file->getClientOriginalName();
        $file->move(('laporan/'),$file->getClientOriginalName());

        $insert = ([
            $today = Carbon::now(),
            'created_at' => $today,
            'updated_at' => $today,
            'laporan' => $request->laporan,
            'kelurahan' => Auth::user()->kelurahan,
            'kecamatan' => Auth::user()->kecamatan,
            'fotoLaporan' => $request->file('foto')->getClientOriginalName(),
            'status' => $request->status,
            'users' => Auth::user()->id,

        ]);

        laporan::create($insert);
        $view=laporan::orderBy('created_at','DESC')->get();
        return view ('dashboardKades',compact('view'));
    }

    public function laporanSayaKades($id){
        $view = laporan::where('users',$id)->orderBy('created_at','DESC')->get();
        $lihat=komen::orderBy('posttime','asc')->get();
        return view('laporanSayaKades',compact('view','lihat'));
        return view('laporanSayaKades',compact('view','lihat'));
    }

    public function editLaporanKades($id){
        $edit=laporan::find($id);
        $kecamatan = kecamatan::all();
        return view('editLaporanKades',compact('edit','kecamatan'));
    }

    public function updateLaporanKades(Request $request,$id){
        $today = Carbon::now();
        $edit=laporan::find($id);
        $edit->laporan= $request->laporan;
        $ft = $request->file('foto');
        if ($ft != null){
            // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
            $fileName   = $ft->getClientOriginalName();
            $ft->move(('laporan/'),$ft->getClientOriginalName());
            $edit->fotoLaporan = $fileName;
        }
        $edit->created_at=$today;

        $statusx=$request->status;

        if ($statusx!=null){
            $edit->status=$request->status;
        }

        $edit->save();
        $view=laporan::orderBy('created_at','DESC')->get();
        return view('dashboardKades', compact(Auth::user()->id,'view'));
    }

    public function deleteLaporanKades($id){
        $laporan = laporan::where('idLaporan',$id);
        $image_url=laporan::select('fotoLaporan')->where('idLaporan', $id)->get();
        File::delete('laporan/' . $image_url);
        $laporan->delete();
        return redirect()->back();
    }

    public function aadkomentar(Request $r){
        // echo $r->idlaporan;
       // echo $r->komentar;
       // echo $r->user;
        $insert = ([
                    $today = Carbon::now(),
                    'posttime' => $today,
                    'comment' => $r->komentar,
                    'laporan' => $r->idlaporan,
                    'comment_sender' => $r->user,
                    'idSender'=> $r->iduser,
                ]);
        $save=komen::create($insert);
        $foto=User::where('id',$r->iduser)->first()->foto;
       
    // echo $foto->foto;
    //   return $save;
        return response()->json([
            'foto'=>$foto,
        ]);
    }
}

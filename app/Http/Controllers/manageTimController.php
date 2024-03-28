<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\tim;
use App\Models\User;
use App\Models\anggota;

class manageTimController extends Controller
{
    public function index(){
        $jdl = "Manage Tim";

        $data = tim::all();
        $anggota = anggota::all();
        
        return view('tim.v_index',['jdl' => $jdl,'data'=>$data,'anggota' => $anggota]);
    }

    public function tambahTim(){
        $jdl = 'Tambah Tim Baru';
        return  view('tim.v_tambah',['jdl' =>  $jdl]);
    }

    public function storeTim(Request $request){
        $this->validate($request,[
            'nama_tim' => 'Required'
        ],
          [
            'required' => 'Nama  Tim Wajib Diisi',
          ]   
        );

        // Dapatkan ID pengguna yang saat ini masuk
        $usersId = Auth::id();

        Tim::create([
            'nama_tim' => $request->nama_tim,
            'users_id' => $usersId
        ]);

        return  redirect()->route('manageTim.index')->with('success','Tambah Tim Berhasil!!');
    }

    public  function detailTim($id,$tim_id){
        $jdl = 'Detail Tim';
        $tim = tim::find($id);
        
        $anggota = anggota::where('tim_id',$tim_id)->get();

        $users = [];

        foreach ($anggota as $ang) {
            $userIds = explode(',', $ang->user_id);
        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
                $users[] = $user;
            }
        }
    }

    //Menampilkan  Total Anggota  :
    $anggotas = anggota::all();
    $totalAnggotaPerTim = [];
    $timIdIndex = $tim->anggota->first()->tim_id;
    
    // Lakukan iterasi melalui setiap anggota
    foreach ($anggotas as $anggota) {
        $timId = $anggota->tim_id;
        $userId = $anggota->user_id;
        
        // Menghitung jumlah anggota dari user_id (angka dipisahkan koma)
        $jumlahAnggota = count(explode(',', $userId));
    
        // Tambahkan jumlah anggota ke total untuk tim yang bersangkutan
        if (!isset($totalAnggotaPerTim[$timId])) {
            $totalAnggotaPerTim[$timId] = 0; // Inisialisasi jika belum ada
        }
        $totalAnggotaPerTim[$timId] += $jumlahAnggota;
    }
        return view('tim.v_detail',['jdl' => $jdl,'tim' => $tim,'anggota'=> $anggota,'users' => $users,'totalAnggotaPerTim' => $totalAnggotaPerTim,'timIdIndex' => $timIdIndex,'anggotas' => $anggotas]);
    }

    //==============Anggota============
    public function tambahAnggota(){
        $jdl    = "Tambah Anggota";
        $user   = User::all();
        $tim    = tim::all();

        return view('tim.v_tambahAnggota',['jdl' => $jdl,'user' => $user,'tim' =>  $tim]);
    }

    public function storeAnggota(Request $request){

        $this->validate($request,[
            'tim_id' =>  'required',
            'user_id' => 'required',
        ],
        [
            'tim_id.required' => "Tim Wajib Diplih!!",
            'user_id.required' => "Anggota Wajib Dipilih!!",
        ]
        );

        // Mengonversi array user_id menjadi string dengan pemisah koma
        $userIds = implode(',', $request->user_id);

         // Simpan setiap user_id sebagai entri terpisah
        anggota::create([
            'tim_id' => $request->tim_id,
            'user_id' => $userIds,
        ]);
    
        return  redirect()->route('manageTim.index')->with('success','Tambah Tim Berhasil!!');
    }
    
    public function  destroyAnggota($id){
        $anggota = anggota::find($id);
        
        $anggota->delete();

        return  redirect()->route('manageTim.index')->with('success','Tambah Tim Berhasil!!');
    }
}

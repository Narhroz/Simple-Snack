<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesan;
use App\Models\Barang;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $barang = Barang::where('Nama_barang','LIKE','%' .$request->search.'%')
            ->orWhere('stock','LIKE','%' . $request->search.'%')
            ->orWhere('Harga','LIKE','%' . $request->search.'%')
            ->orWhere('Deskripsi','LIKE','%' . $request->search.'%')
            ->orWhere('Id','LIKE','%' . $request->search.'%')->paginate(3);
        }else{
            $barang = Barang::paginate(3);
        }
        $users = User::paginate(3);
        $items = Barang::count();
        $user = User::where('role','0')->count();
        $admins = User::where('role','1')->count();
        return view('adm.admin',compact('items','user','admins','barang','users'));
    }
    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$Nama_barang = DB::table('barang')
		->where('Nama_barang','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('/admindex',['Nama_barang' => $Nama_barang]);
 
	}
    public function akun()
    {
        $order = Order::paginate(5);
        // $pesan = Pesan::paginate(5);
        return view('adm.cust',compact('order'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.add',[
            'barang' => barang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Nama_barang' => 'required|max:30',
            'Harga' => 'required|max:30',
            'Deskripsi' => 'required|max:30',
            'image' => 'image|file|max:2560',
            'stock' => 'required|max:100',
        ]);
        $data = Barang::create($data);

        if($request->hasFile('image')){
            $request->file('image')->move('uploaded-images/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $barang = Barang::all();
        // return view('Ecom.product',['barang'=>$barang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($Id)
    {
        return view('adm.edit',[
            'data' =>Barang::where('Id',$Id)->first(),
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id)
    {
        $data = $request->validate([
            'Nama_barang' => 'required|max:30',
            'Harga' => 'required|max:30',
            'Deskripsi' => 'required|max:30',
            'stock' => 'required|max:100',
        ]);
        $update = Barang::where('Id', $Id)->update($data);
        if($update){
            return redirect('/admin/admindex');
        }
        else{
            return $request->all();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id)
    {
        $delete = Barang::where('Id', $Id)->delete();
        if($delete){
            return redirect('/admin/admindex');
        }
    }
    public function hapus($id)
    {
        $delete = Order::where('id', $id)->delete();
        if($delete){
            return redirect('/admin/akun');
        }
    }
}

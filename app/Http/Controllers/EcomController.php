<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Pesan;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EcomController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function perbarui(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|max:30',
            'phone' => 'required|max:12',
            'address' => 'required|max:30',
        ]);
        $update = User::where('id',$id)->update($data);
        if($update){
            return redirect('/index');
        }
        else{
            return $request->all();
        }
    }
    public function home()
    {
    //    $users=auth()->User();
    //    $count=Cart::where('phone',$users->phone)->count();
    //    return view('Ecom.index',compact('count'));
    $keranjang = Cart::where('uid',auth::id())->count();
    return view('Ecom.index', compact('keranjang'));
    }

    // public function cartcount()
    // {
    //     $cartcount = Cart::where('Id',Auth::id())->count();
    //     return response()->json(['count'=>$cartcount]);
    // }
    public function product()
    {
        $barang = Barang::all();
        $keranjang = Cart::where('uid',auth::id())->count();
        //$check = Barang::all()->first();
        return view('Ecom.product', compact('barang','keranjang'));
    }
    public function cart()
    {
        if(Auth::Id()){
            $users=auth()->User();
            $cart = Cart::where('uid',auth::id())->get();
            $check = Cart::where('uid',auth::id())->first();
            $keranjang = Cart::where('uid',auth::id())->count();
            $no = 1;
            $jumlah1 = 0;
            return view('Ecom.cart', compact('cart','no','jumlah1','check','keranjang'));
        }
        else{
            return redirect('/login');
        }
    }
    public function addcart(Request $request,$Id)
    {
        if(Auth::Id()){
            $users=auth()->User();
            $barang=Barang::find($Id);
            $cart = new Cart;
            $cart->name=$users->name;
            $cart->phone=$users->phone;
            $cart->address=$users->address;
            $cart->product_title=$barang->Nama_barang;
            $cart->price=$barang->Harga;
            $cart->image=$barang->image;
            $cart->Qty = $request->Qty;
            $cart->uid = $users->id;
            $cart->save();
            return redirect()->back()->with('message','Product added successfully');
        }
        else{
            return redirect('/login');
        }
    }
    public function checkout(Request $request,$id){
            // $collection = collect(["one", "two", "three", "four", "five"]);
    
            // $output = $collection->implode('-');
            $cart=Cart::find($id);
            //$barang=Barang::where('Id',$id)->get();
            // $temp->extra_services = collect($request->extra_services)->implode(',');
            $order = Order::create([
                'uid'=>auth::id(),
                'name'=>$cart->name,
                'phone'=>$cart->phone,
                'address'=>$cart->address,
                'produk'=>$cart->product_title=collect($cart->product_title)->implode(','),
                'Qty'=>$cart->Qty,
                'total'=> 0,
            ]);
            // $checkout = $order->implode(['produk',"','",$order->produk]);
            // Order::insert($checkout);
            // dd($checkout);
        $carto = Cart::with('barang')->where('uid',auth::id())->get();
        foreach ($carto as $cartProduct){
            $order->barang()->attach($cartProduct->Id, [
                'product_title'=>collect($cartProduct->product_title)->implode(','),
                'Qty' => $cartProduct->Qty,
                'Harga'=>$cartProduct->price,
            ]);

            $order->increment('total',$cartProduct->Qty * $cartProduct->price);
            //Barang::find($cartProduct->id)->decrement('stock',$barang->stock - $cartProduct->Qty);
           //$barang->decrement('stock',$cartProduct->Qty);
        }
        Cart::where('uid',auth::id())->delete();
        return redirect('/cart');
    }
    public function checkouto(){
            $cart = Cart::with('barang')->where('uid',auth::id())->get();
            $barang = Barang::select('Id','stock')->whereIn('id',$cart->pluck('Id'))->pluck('stock','Id');
            foreach ($cart as $cartProduct) {
                // $product = Barang::find($cartProduct->Id);
                if (!isset($barang[$cartProduct->Id]) || $barang[$cartProduct->Id] < $cartProduct->Qty) {
                    // $this->checkout_message = 'Error: barang tidak ada';
                }
            }
        //DB::transaction(function() use($cart){
            //$keranjang=Cart::find($id);
            $order = Order::create([
                'uid'=>auth::id(),
                'total'=> 0
            ]);

                foreach ($cart as $cartProduct){
                    $order->barang()->attach($cartProduct->Id, [
                        'Qty' => $cartProduct->Qty,
                        'Harga'=>$cartProduct->price,
                    ]);
        
                    $order->increment('total',$cartProduct->Qty * $cartProduct->price);
        
                    //Barang::find($cartProduct->id)->decrement('stock',$cartProduct->Qty);
                }
                Cart::where('uid',auth::id())->delete();
                // $this->checkout_message = 'Success';
        //});
        

        return redirect('/cart');
    }
    public function profile($id)
    {
        return view('Ecom.profile',[
            'data'=>User::where('id',$id)->first(),
        ]);
    }
    public function check($id)
    {
        if(Auth::id()){
            // $users=auth()->User();
            // $data = Cart::where('id',auth::id())->first();
            return view('Ecom.check',[
                'data'=>Cart::where('id',$id)->first(),
            ]);
        }
        else{
            return redirect('/login');
        }
    }
    public function new(Request $request,$id)
    {
        $data = $request->validate([
            'name' => 'required|max:30',
            'phone' => 'required|max:12',
            'address' => 'required|max:30',
            'Qty' => 'required|max:30',
        ]);
        $update = Cart::where('id',$id)->update($data);
        if($update){
            return redirect('/cart');
        }
        else{
            return $request->all();
        }
    }
    public function contact()
    {
        $keranjang = Cart::where('uid',auth::id())->count();
        $contact = Pesan::all();
        return view('Ecom.contact', compact('keranjang','contact'));
    }
    public function pesan(Request $request)
    {
        $data = $request->validate([
            'nama_awal' => 'required|max:30',
            'nama_akhir' => 'required|max:30',
            'email' => 'required|max:30',
            'no_telp' => 'required|max:20',
            'pesan' => 'required|max:30'
        ]);
        $data = Pesan::create($data);
        return redirect('/index');
    }
    public function show()
    {
        // $barang = Barang::all();
        // return view('Ecom.product',['barang'=>$barang]);
    }
    public function destroy($id)
    {
        $delete = Cart::where('id', $id)->delete();
        if($delete){
            return redirect('/cart');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{   

    public function index(Request $request, $id)
    {   
        $product = Product::with(['category'])->where('slug', $id)->firstOrFail();
        return view('pages.transaction.show',[
            'product' => $product
        ]);
    }

    public function add(Request $request, $id){
        /* $data = [
            'products_id' => $id,
            'users_id' =>Auth::user()->id,
        ];

        Cart::create($data);

        return redirect()->route('cart'); */

        // Cek apakah produk sudah ada di keranjang pengguna
        $existingCart = Cart::where('users_id', Auth::user()->id)
            ->where('products_id', $id)
            ->first();

        if ($existingCart) {
            // Jika produk sudah ada di keranjang, tambahkan jumlahnya
            $existingCart->increment('quantity'); // Increment quantity by 1
        } else {
            // Jika produk belum ada di keranjang, tambahkan sebagai entri baru
            Cart::create([
                'users_id' => Auth::user()->id,
                'products_id' => $id,
                'quantity' => 1, // Jumlah awal jika belum ada dalam keranjang
            ]);
        }

        return redirect()->route('cart'); 
    }
}
 


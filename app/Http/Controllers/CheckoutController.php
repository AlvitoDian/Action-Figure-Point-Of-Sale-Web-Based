<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{   
    public function index()
    {
        $products = Product::with(['category'])->get();
        return view('pages.transaction.index',[
            'products' => $products
        ]);
    }

    public function process(Request $request){
        // Save User Data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // Proses Checkout
        $code = 'CODE-' .  mt_rand(000000,999999);
        $carts =  Cart::with(['product','user'])
                    ->where('users_id', Auth::user()->id)
                    ->get();
        
        // Transaction Create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'tax_price' => 0,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code
        ]);

        // Foreach Transaction Detail
        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(000000,999999);

            $quantity = $cart->quantity;

            for ($i = 0; $i < $quantity; $i++) {
            TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'products_id' => $cart->product->id,
            'price' => $cart->product->price,
            'delivery_status' => 'PENDING',
            'code' => $trx,
            'notes' => Auth::user()->notes,
            'payment_method' => Auth::user()->payment_method
        ]);
    }
        }

        // Delete Cart Data
        Cart::where('users_id', Auth::user()->id)->delete();

        return redirect()->route('transaction-user');
        

    }
}

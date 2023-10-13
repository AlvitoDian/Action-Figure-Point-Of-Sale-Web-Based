<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class DashboardTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        /* $transactions = TransactionDetail::with(['transaction.user','product'])
            ->whereHas('transaction', function($transaction){
                $transaction->where('users_id', Auth::user()->id);
            })->get();

        return view('pages.transaction',[
            'transactions' => $transactions
        ]); */

       $transactions = Transaction::with('user')
        ->where('users_id', Auth::user()->id)
        ->get();

        return view('pages.transaction',[
            'transactions' => $transactions
        ]);
    }
    
    public function indexAdmin()
    { 
        /* $transactions = TransactionDetail::with(['transaction.user','product'])
            ->whereHas('transaction', function($transaction){
                $transaction->where('users_id', Auth::user()->id);
            })->get();

        return view('pages.transaction',[
            'transactions' => $transactions
        ]); */

       $transactions = Transaction::with('user')
        ->get();

        return view('pages.transaction-admin.transaction',[
            'transactions' => $transactions
        ]);
    }

    public function details(Request $request, $id)
    {   
        $transactionProducts = TransactionDetail::with(['transaction.user','product'])
            ->where('transactions_id', $id)
            ->get();
        $transactions = Transaction::with('user')
        ->where('id', $id)->first();
            /* dd($transactions); */
         return view('pages.transaction-details', [
        'transactionProducts' => $transactionProducts,
        'transactions' => $transactions
    ]);  
    }
    
    public function detailProducts(Request $request, $id)
    {   
        $productTransDetails = TransactionDetail::with(['transaction.user','product'])
            ->where('id', $id)
            ->first();
           /*  dd($productTransDetails); */
         return view('pages.transaction-details-product', [
        'productTransDetails' => $productTransDetails
    ]);  
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, $id)
    {   
        $data = $request->all();

        $item = Transaction::findOrFail($id);

        /* dd($item); */

        $item->update($data);

        return redirect()->route('transaction-user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}

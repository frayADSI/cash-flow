<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Rate;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OutputTransactionRequest;

class OutputTransactionController extends Controller
{

    function getBalance($currentAmount) {
        $lastTransaction = Transaction::orderBy('created_at', 'desc')->first();
        if($lastTransaction != null) {
            $lastBalance = $lastTransaction->balance;
            return ($lastBalance - $currentAmount);
        } else {
            return ($currentAmount);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentDate = date_default_timezone_set('America/Caracas');
        $rate = Rate::orderBy('created_at', 'desc')->firstOrFail();
            return view('outputTransactionForm', [
                'rate' => $rate,
                'date' => date("y-m-d", strtotime($rate->date))
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OutputTransactionRequest $request)
    {
        $currentUser = Auth::user();

        $currentBalance = $this->getBalance($request->amount);

        if ($currentBalance < 0) {
            return back()->withErrors(['No hay suficiente saldo para esta transacción']);
        }

        $transaction = new Transaction;

        $transaction->date = $request->date;

        $transaction->transaction_type = $request->transaction_type;

        $transaction->description = $request->description;

        $transaction->amount = $request->amount;

        $transaction->rate_id = $request->rate_id;

        $transaction->user_ci = $currentUser->id;

        
        $transaction->balance = $currentBalance; 

        $transaction->save();

        return back()->with('status','creado con exito');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
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

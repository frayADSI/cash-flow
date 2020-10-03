<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class InputTransactionController extends Controller
{
    function getBalance($currentAmount) {
        $lastTransaction = Transaction::orderBy('created_at', 'desc')->first();
        if($lastTransaction != null) {
            $lastBalance = $lastTransaction->balance;
            return ($lastBalance + $currentAmount);
        } else {
            return (0 + $currentAmount);
        }
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
            return view('inputTransactionForm', [
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
    public function store(Request $request)
    {

        $currentUser = Auth::user();

        $currentBalance = $this->getBalance($request->amount);

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



}

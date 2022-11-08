<?php

namespace App\Http\Controllers;
use App\Models\payment;

use Illuminate\Http\Request;

class paymentController extends Controller
{
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
    
        $payment=payment::all();
    

        return view('pays.index', compact('payment'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'payfor'=>'required',
            'amount'=>'required',
            'whopay'=>'required'
        ]);

        $payment=new payment([
           
                'payfor' => $request->get('payfor'),
                'amount' => $request->get('amount'),
                'whopay' => $request->get('whopay')
                
             
        ]);

        


        $payment->save();
        return redirect('/pays')->with('success', 'payment saved Successfuly!');


    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $payId
     * @return \Illuminate\Http\Response
     */
    public function show($payId)
    {
        $payment=payment::find($payId)->first();
       return view('pays.show',compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $payId
     * @return \Illuminate\Http\Response
     */
    public function edit($payId)
    {
        $payment = payment::find($payId);
        return view('pays.edit', compact('payment')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $payId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $payId)
    {
        $request->validate([
            'payfor'=>'required',
            'amount'=>'required',
            'whopay'=>'required'
            
        ]);

        $payment = payment::find($payId);
        

        $payment->payment_for =  $request->get('payfor');
        $payment->Amount = $request->get('amount');
        $payment->pay_id = $request->get('whopay');
        
        $payment->save();

        return redirect('/')->with('success', 'payment updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $payId
     * @return \Illuminate\Http\Response
     */
    public function destroy($payId)
    {
        $payment=payment::find($payId);
        $payment->delete();
        return redirect('/')->with('success', 'payment deleted!');
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
class BookingController extends Controller
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
    
        $booking=booking::all();
    

        return view('books.index', compact('booking'));

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
            'startdate'=>'required',
            'enddate'=>'required',
            'whatbooked'=>'required',
            'amount'=>'required'
        ]);

        $booking=new booking([
           
                'startDate' => $request->get('startdate'),
                'endDate' => $request->get('enddate'),
                'whatBooked' => $request->get('whatbooked'),
                'amountTopay' => $request->get('amount'),
                
             
        ]);

        


        $booking->save();
        return redirect('/books')->with('success', 'Booked Successfuly!');


    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $BookId
     * @return \Illuminate\Http\Response
     */
    public function show($BookId)
    {
        $booking=booking::find($BookId)->first();
       return view('books.show',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $BookId
     * @return \Illuminate\Http\Response
     */
    public function edit($BookId)
    {
        $booking = booking::find($BookId);
        return view('books.edit', compact('booking')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $BookId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $BookId)
    {
        $request->validate([
            'startdate'=>'required',
            'enddate'=>'required',
            'whatbooked'=>'required',
            'amount'=>'required',
            
        ]);

        $booking = booking::find($BookId);
        

        $booking->startDate =  $request->get('startdate');
        $booking->endDate = $request->get('enddate');
        $booking->whatBooked = $request->get('whatbooked');
        $booking->amountTopay= $request->get('amount');
        
        $booking->save();

        return redirect('/')->with('success', 'booking updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $BookId
     * @return \Illuminate\Http\Response
     */
    public function destroy($BookId)
    {
        $booking=booking::find($BookId);
        $booking->delete();
        return redirect('/')->with('success', 'Customer deleted!');
    }
}

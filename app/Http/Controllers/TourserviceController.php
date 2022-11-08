<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tour_service;

class TourserviceController extends Controller
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
    
        $tour_service=tour_service::all();
    

        return view('tours.index', compact('tour_service'));

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
            'location'=>'required',
            'amount'=>'required'
        ]);

        $tour_service=new tour_service([
           
                'startDate' => $request->get('startdate'),
                'endDate' => $request->get('enddate'),
                'location' => $request->get('location'),
                'amountTopay' => $request->get('amount'),
                
             
        ]);

        


        $tour_service->save();
        return redirect('/tours')->with('success', 'Booked Successfuly!');


    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $tourId
     * @return \Illuminate\Http\Response
     */
    public function show($tourId)
    {
        $tour_service=tour_service::find($tourId)->first();
       return view('tours.show',compact('tour_service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $tourId
     * @return \Illuminate\Http\Response
     */
    public function edit($tourId)
    {
        $tour_service = tour_service::find($tourId);
        return view('tours.edit', compact('tour_service')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $tourId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tourId)
    {
        $request->validate([
            'stardate'=>'required',
            'endate'=>'required',
            'location'=>'required',
            'amountpay'=>'required',
            
        ]);

        $tour_service = tour_service::find($tourId);
        

        $tour_service->startDate =  $request->get('stardate');
        $tour_service->endDate = $request->get('endate');
        $tour_service->location = $request->get('location');
        $tour_service->amountTopay= $request->get('amountpay');
        
        $tour_service->save();

        return redirect('/')->with('success', 'tour_service updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $tourId
     * @return \Illuminate\Http\Response
     */
    public function destroy($tourId)
    {
        $tour_service=tour_service::find($tourId);
        $tour_service->delete();
        return redirect('/')->with('success', 'Tour deleted!');
    }
}

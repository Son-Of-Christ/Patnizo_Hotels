<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

class CommentController extends Controller
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
    
        $comment=comment::all();
    

        return view('coms.index', compact('comment'));

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
            'fullName'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);

        $comment=new comment([
           
                'fullName' => $request->get('fullName'),
                'email' => $request->get('email'),
                'message' => $request->get('message')
                
             
        ]);

        


        $comment->save();
        return redirect('/coms')->with('success', 'Comment saved Successfuly!');


    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $comId
     * @return \Illuminate\Http\Response
     */
    public function show($comId)
    {
        $comment=comment::find($comId)->first();
       return view('coms.show',compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $comId
     * @return \Illuminate\Http\Response
     */
    public function edit($comId)
    {
        $comment = comment::find($comId);
        return view('coms.edit', compact('comment')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $comId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $comId)
    {
        $request->validate([
            'fullname'=>'required',
            'email'=>'required',
            'message'=>'required'
            
        ]);

        $comment = comment::find($comId);
        

        $comment->fullName =  $request->get('fullname');
        $comment->Email = $request->get('email');
        $comment->Message = $request->get('message');
        
        $comment->save();

        return redirect('/')->with('success', 'Comment updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $comId
     * @return \Illuminate\Http\Response
     */
    public function destroy($comId)
    {
        $comment=comment::find($comId);
        $comment->delete();
        return redirect('/')->with('success', 'Comment deleted!');
    }
}


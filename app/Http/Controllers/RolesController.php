<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\roles;

class RolesController extends Controller
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
    
        $roles=roles::all();
    

        return view('roles.index', compact('roles'));

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
            'rolename'=>'required'
        ]);

        $roles=new roles([
           
                'rolename' => $request->get('rolename')
                
             
        ]);

        


        $roles->save();
        return redirect('/roles')->with('success', 'new Roles Added Successfuly!');


    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $rolesId
     * @return \Illuminate\Http\Response
     */
    public function show($rolesId)
    {
        $roles=roles::find($rolesId)->first();
       return view('roles.show',compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $rolesId
     * @return \Illuminate\Http\Response
     */
    public function edit($rolesId)
    {
        $roles = roles::find($rolesId);
        return view('roles.edit', compact('roles')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $rolesId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rolesId)
    {
        $request->validate([
            'rolename'=>'required'
            
        ]);

        $roles = roles::find($rolesId);
        

        $roles->name=$request->get('rolename');
        
        $roles->save();

        return redirect('/')->with('success', 'Roles updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $rolesId
     * @return \Illuminate\Http\Response
     */
    public function destroy($rolesId)
    {
        $roles=roles::find($rolesId);
        $roles->delete();
        return redirect('/')->with('success', 'Roles deleted!');
    }
}

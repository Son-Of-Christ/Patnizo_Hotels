<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permissions;

class PermissionController extends Controller
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
    
        $permissions=permissions::all();
    

        return view('perms.index', compact('permissions'));

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
            'permissionname'=>'required'
        ]);

        $permissions=new permissions([
           
                'permissionname' => $request->get('permissionname')
                
             
        ]);

        


        $permissions->save();
        return redirect('/perms')->with('success', 'new Permission Added Successfuly!');


    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $permissionId
     * @return \Illuminate\Http\Response
     */
    public function show($permissionId)
    {
        $permissions=permissions::find($permissionId)->first();
       return view('perms.show',compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $permissionId
     * @return \Illuminate\Http\Response
     */
    public function edit($permissionId)
    {
        $permissions = permissions::find($permissionId);
        return view('perms.edit', compact('permissions')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $permissionId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permissionId)
    {
        $request->validate([
            'permissionname'=>'required'
            
        ]);

        $permissions = permissions::find($permissionId);
        

        $permissions->name=  $request->get('permissionname');
        
        $permissions->save();

        return redirect('/')->with('success', 'permission updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $permissionId
     * @return \Illuminate\Http\Response
     */
    public function destroy($permissionId)
    {
        $permissions=permissions::find($permissionId);
        $permissions->delete();
        return redirect('/')->with('success', 'Permission deleted!');
    }
}

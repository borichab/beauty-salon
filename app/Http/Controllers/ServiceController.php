<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\parlours;
use App\Services;
use App\User;
use Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::with('parlour')->get();
        return view('services', compact('services'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexServ()
    {
        $uid = Auth::user()->id;
        $parlour = parlours::with('user')->where('user_id', $uid)->get();
        $pid = $parlour['0']['id'];
        $services = Services::where('parlour_id', $pid)->get();
        return view('dashboard', compact('parlour','services'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addService');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'category' => 'required',
            'discount' => 'max:100|min:0',
            'price' => 'required|numeric',
            'duration' => 'required',
        ]);
        
        $uid = Auth::user()->id;
        $parlour = parlours::where('user_id', $uid)->get();
        $pid = $parlour['0']['id'];
        
        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('img/services'), $input['image']);
        $input['name'] = $request->name;
        $input['description'] = $request->description;
        $input['category'] = $request->category;
        $input['discount'] = $request->discount;
        $input['price'] = $request->price;
        $input['duration'] = $request->duration;
        $input['parlour_id'] = $pid;
        Services::create($input);
        
        return redirect('admin/dashboard')->with('success', 'New Service Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

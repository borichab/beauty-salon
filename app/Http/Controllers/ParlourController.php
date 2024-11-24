<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\parlours;
use Auth;
use App\Services;
use App\User;

class ParlourController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parlours = parlours::with('user')->where('availability', '=', 'available')->get();
        return view('parlour', compact('parlours'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexParl()
    {
        $uid = Auth::user()->id;
        $parlour = parlours::with('user')->where('user_id' , '=', $uid)->get();
        $pid = $parlour['0']['id'];
        $services = Services::where('parlour_id', $pid)->get();
        return view('dashboard', compact('parlour', 'services', 'pid'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parlourIndex($id)
    {
        $parlours = parlours::where('id', $id)->get();
        $services = Services::where('parlour_id', $id)->get();
        return view('viewParlour', compact('parlours', 'services'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addParlour');
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
            'owner_f_name' => 'required',
            'owner_l_name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'location_url' => 'required|url',
            'mobile' => 'required|max:15',
            'about_parlour' => 'required',
        ]);
        
        $uid = Auth::user()->id;

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('img/parlours'), $input['image']);
        $input['name'] = $request->name;
        $input['owner_f_name'] = $request->owner_f_name;
        $input['owner_l_name'] = $request->owner_l_name;
        $input['address'] = $request->address;
        $input['gender'] = $request->gender;
        $input['city'] = $request->city;
        $input['location_url'] = $request->location_url;
        $input['mobile'] = $request->mobile;
        $input['availability'] = "available";
        $input['about_parlour'] = $request->about_parlour;
        $input['user_id'] = $uid;
        parlours::create($input);
        
        return redirect('admin/dashboard')->with('success', 'Parlour Added');
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

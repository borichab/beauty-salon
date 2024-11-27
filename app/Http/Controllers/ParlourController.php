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
         // Check if the authenticated user already has a parlour
        $userId = Auth::user()->id;
        $parlour = parlours::where('user_id', $userId)->first();

        // If the user already has a parlour, redirect or show a message
        if ($parlour) {
            return redirect()->route('dashboard')->with('error', 'You already have a parlour.');
        }
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
        $parlour = parlours::findOrFail($id);
        return view('parlourDetail', compact('parlour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parlour = parlours::findOrFail($id);
        return view('editParlour', compact('parlour'));
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'owner_f_name' => 'required|string|max:255',
            'owner_l_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'location_url' => 'required|url',
            'mobile' => 'required|string|max:15',
            'about_parlour' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $parlour = parlours::findOrFail($id);

        $parlour->name = $validated['name'];
        $parlour->owner_f_name = $validated['owner_f_name'];
        $parlour->owner_l_name = $validated['owner_l_name'];
        $parlour->address = $validated['address'];
        $parlour->city = $validated['city'];
        $parlour->location_url = $validated['location_url'];
        $parlour->mobile = $validated['mobile'];
        $parlour->about_parlour = $validated['about_parlour'];

        if ($request->hasFile('image')) {
            $imagePath = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('img/parlours'), $imagePath);
            $parlour->image = $imagePath;
        }

        $parlour->save();

        return redirect('parlours/' . $id)->with('success', 'Parlour details updated successfully.');
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

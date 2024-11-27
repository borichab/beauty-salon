<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use App\SliderImages;


class SliderImage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = SliderImages::with('service')->get();
        return view('sliderimages', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usedServiceIds = SliderImages::pluck('service_id')->toArray();
        $services = Services::whereNotIn('id', $usedServiceIds)->get();

        return view('selectimage', compact('services'));
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
            'title' => 'required|string',
            'msg' => 'required|string',
            'service_id' => 'required|numeric',
        ]);
        
        $input['title'] = $request->title;
        $input['msg'] = $request->msg;
        $input['service_id'] = $request->service_id;
        $input['status'] = '1';
        SliderImages::create($input);
        
        return redirect()->back()->with('success', 'Image Added');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
 {
    
    $cities= City::with('country')->orderBy('id' , 'desc');

    if ($request->get('city_name')) {
        $cities = City::where('city_name', 'like', '%' . $request->city_name . '%');
    }
    if ($request->get('street')) {
        $cities = City::where('street', 'like', '%' . $request->street . '%');
    }
   

    $cities = $cities->paginate(10);


    return response()->view('cms.city.index' , compact('cities'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();

        return response()->view('cms.city.create' , compact('countries'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'city_name'=> 'required|string|min:3|max:20',
            'street' => 'required:cities',
            'country_id' => 'required:cities',
        ],[
            'city_name.required' =>"Please enter city name !",
            'city_name.min' =>"No accept less than 3 latter !",
            'city_name.max' =>"No accept more than 20 latter !",
        ]
    
    );

        if(! $validator->fails()){
            $cities = new city();
            $cities->city_name = request()->get('city_name');
            $cities->street = request()->get('street');
            $cities->country_id = request()->get('country_id');

            $isSaaved = $cities->save();
            if ($isSaaved) {
            return response()->json(['icon' => 'success' , 'title' => "created is successfully"] , 200);

            } 
        }
        else{
            return response()->json(['icon' => 'error' , 'title' =>$validator->getMessageBag()->first()] , 400);
        }
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
        $cities = City::findOrFail($id);
        $countries = Country::all();

        return response()->view('cms.city.edit' , compact('cities' ,'countries'));
        
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
        $validator = Validator($request->all(),[
            'city_name'=> 'required|string|min:3|max:20',
            'street' => 'required:cities'
        ],[
            'city_name.required' =>"Please enter country name !",
            'city_name.min' =>"No accept less than 3 latter !",
            'city_name.max' =>"No accept more than 20 latter !",
        ]
    
    );

        if(! $validator->fails()){
            $cities = City::findOrFail($id);
            $cities->city_name = request()->get('city_name');
            $cities->street = request()->get('street');
            $cities->country_id = request()->get('country_id');


            $isUpdated = $cities->save();
            return ['redirect' => route('cities.index') ];
            if ($isUpdated) {
            return response()->json(['icon' => 'success' , 'title' => "Updated is successfully"] , 200);

            } 
        }
        else{
            return response()->json(['icon' => 'error' , 'title' =>$validator->getMessageBag()->first()] , 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cities = City::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => "Deleted is successfully"] , 200);
 
    }
}

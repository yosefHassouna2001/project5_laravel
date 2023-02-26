<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = Country::withCount('cities')->orderBy('id' , 'desc')->paginate(10);
        return response()->view('cms.country.index' , compact('countries'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.country.create');
        
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
            'name'=> 'required|string|min:3|max:20',
            'code' => 'required|numeric|digits:3|unique:countries'
        ],[
            'name.required' =>"Please enter country name !",
            'name.min' =>"No accept less than 3 latter !",
            'name.max' =>"No accept more than 20 latter !",
            'code.digits' =>"No accept more than 3 digits !",
            'code.unique' =>"This record already exist !",
        ]
    
    );

        if(! $validator->fails()){
            $countries = new Country();
            $countries->name = request()->get('name');
            $countries->code = request()->get('code');

            $isSaaved = $countries->save();
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
        $countries = Country::findOrFail($id);
        return response()->view('cms.country.edit' , compact('countries'));
        
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
            'name'=> 'required|string|min:3|max:20',
            'code' => 'required|numeric|digits:3|unique:countries'
        ],[
            'name.required' =>"Please enter country name !",
            'name.min' =>"No accept less than 3 latter !",
            'name.max' =>"No accept more than 20 latter !",
            'code.digits' =>"No accept more than 3 digits !",
            'code.unique' =>"This record already exist !",
        ]
    
    );

        if(! $validator->fails()){
            $countries = Country::findOrFail($id);
            $countries->name = request()->get('name');
            $countries->code = request()->get('code');

            $isSaaved = $countries->save();
            return ['redirect' => route('countries.index') ];
            if ($isSaaved) {
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
        $countries = Country::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => "Deleted is successfully"] , 200);
 
    }
}

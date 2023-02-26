<?php

namespace App\Http\Controllers;


use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class SliderController extends Controller
{    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
    
        $sliders= Slider::orderBy('id' , 'desc');

        if ($request->get('title')) {
            $sliders = Slider::where('title', 'like', '%' . $request->title . '%');
        }
        if ($request->get('description')) {
            $sliders = Slider::where('description', 'like', '%' . $request->description . '%');
        }
        if ($request->get('created_at')) {
            $sliders = Slider::where('created_at', 'like', '%' . $request->created_at . '%');
        }

        $sliders = $sliders->paginate(5);


        return response()->view('cms.slider.index' , compact('sliders'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all() , [

        ],[

        ]);

        if(! $validator->fails()){
            $sliders = new Slider();

            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/slider', $imageName);
                $sliders->image = $imageName;
            }

            $sliders->title = $request->get('title');
            $sliders->description = $request->get('description');

            $isSaved = $sliders->save();

            return response()->json([
                'icon' => $isSaved ? 'success' : 'error',
                'title' => $isSaved ? "Created is Successfully" : "Created is Faield",
            ] , $isSaved ? 201 : 400);
        }
        else{
            return response()->json([
                'icon' => 'error' ,
                'title' => $validator->getMessageBag()->first(),
            ] , 400);
        }

    }


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
        $sliders = Slider::findOrFail($id);
        return response()->view('cms.slider.edit' , compact('sliders' ));

    }

    public function update(Request $request, $id){

            $validator = Validator($request->all(),[

            ]);
            if(! $validator->fails()){
            $sliders =  Slider::findOrFail($id);

            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/slider', $imageName);
                $sliders->image = $imageName;
            }

            $sliders->title = $request->get('title');
            $sliders->description = $request->get('description');

            $isUpdate = $sliders->save();
            return ['redirect' => route('sliders.index')];


            return response()->json([
                'icon' => $isUpdate ? 'success' : 'error' ,
                'title' => $isUpdate ? "Created is Successfully" : "Created is Faield",
            ] , $isUpdate ? 200 : 400);


        }
        else{
            return response()->json([
                'icon' => 'error' ,
                'title' => $validator->getMessageBag()->first(),
            ] , 400);
        
        }
    }

    public function destroy($id)
    {
        $sliders = Slider::destroy($id);

    }
}

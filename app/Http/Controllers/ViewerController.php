<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Viewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ViewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewers = Viewer::with('user')->orderBy('id' , 'desc')->paginate(10);
        return response()->view('cms.viewer.index' , compact('viewers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return response()->view('cms.viewer.create' , compact('cities'));
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
            'email'=> 'required|email',
            'image'=>"required|image|max:2048|mimes:png,jpg,jpeg,pdf",

        ],[
            'email.required' =>"Please enter email !",
            'email.email' =>"Please enter email example email@gmail.com !",
        ]
    
    );

        if(! $validator->fails()){
            $viewers = new Viewer();
            $viewers->email = request()->get('email');
            $viewers->password = Hash::make($request->get('password'));

            $isSaaved = $viewers->save();
            if ($isSaaved) {
                $users = new User();

                if($request->hasFile('image')){
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/viewer', $imageName);
                    $users->image = $imageName;
                }

                $users->first_name = request()->get('first_name');
                $users->last_name = request()->get('last_name');
                $users->mobile = request()->get('mobile');
                $users->address = request()->get('address');
                $users->date_of_birth = request()->get('date_of_birth');
                $users->gender = request()->get('gender');
                $users->status = request()->get('status');
                $users->city_id = request()->get('city_id');
                $users->actor()->associate($viewers);
            
                $isSaaved = $users->save();
                if ($isSaaved) {

                return response()->json([
                'icon' => 'success' ,
                'title' => "created is successfully"
                ] , 200);
                }
                else{
                    return response()->json([
                        'icon' => 'error' ,
                        'title' => "created is Failed"
                        ] , 400);
                } 
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $viewers = Viewer::findOrFail($id);
        $cities = City::all();
        return response()->view('cms.viewer.edit' , compact('cities' , 'viewers'));

        
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
            'email'=> 'required|email',
            'image' => 'image',
            // $users->image = $imageName;

        ],[
            'email.required' =>"Please enter email !",
            'email.email' =>"Please enter email example email@gmail.com !",
            'image.image' =>"Please enter image !",
        ]
    
    );

        if(! $validator->fails()){
            $viewers = Viewer::findOrFail($id);
            $viewers->email = request()->get('email');
            // $viewers->password = Hash::make($request->get('password'));

            $isUpdate = $viewers->save();

            if ($isUpdate) {
                $users = $viewers->user;

                if($request->hasFile('image')){
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/viewer', $imageName);
                    $users->image = $imageName;
                }
                
                $users->first_name = request()->get('first_name');
                $users->last_name = request()->get('last_name');
                $users->mobile = request()->get('mobile');
                $users->address = request()->get('address');
                $users->date_of_birth = request()->get('date_of_birth');
                $users->gender = request()->get('gender');
                $users->status = request()->get('status');
                $users->city_id = request()->get('city_id');
                $users->actor()->associate($viewers);
            
                $isUpdate = $users->save();
                return ['redirect' =>route('viewers.index')];
                if ($isUpdate) {

                return response()->json([
                'icon' => 'success' ,
                'title' => "created is successfully"
                ] , 200);
                }
                else{
                    return response()->json([
                        'icon' => 'error' ,
                        'title' => "created is Failed"
                        ] , 400);
                } 
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
        $viewers = Viewer::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => "Deleted is successfully"] , 200);

    }
}

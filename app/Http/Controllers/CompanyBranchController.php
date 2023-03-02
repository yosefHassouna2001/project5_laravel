<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyBranch;
use Illuminate\Http\Request;

class CompanyBranchController extends Controller
{

    public function index()
    {
        //

        $companybranchs = CompanyBranch::orderBy('id' , 'desc')->paginate(10);
        // $this->authorize('viewAny' , Company::class);

        return response()->view('cms.companybranch.index' , compact('companybranchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = Company::all();

        return response()->view('cms.companybranch.create' , compact('companies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(),[
            // 'name' => 'required|string|min:3|max:20',
            // 'code' => 'required|numeric|digits:3|unique:countries',
        ] , [
            // 'name.required' => 'هذا الحقل مطلوب' ,
            // 'name.min' => 'لا يقبل أقل من 3 حروف' ,
            // 'name.max' => 'لا يقبل أكثر من 20 حرف' ,
            // 'code.unique' => 'القيمة موجودة مسبقا',
        ]);

        if(! $validator->fails() ){
            $companybranchs = new CompanyBranch();
            $companybranchs->name = $request->get('name');
            $companybranchs->email = $request->get('email');
            $companybranchs->password = $request->get('password');
            $companybranchs->status = $request->get('status');
            $companybranchs->description = $request->get('description');

            $isSaved = $companybranchs->save();
            if($isSaved){
                return response()->json(['icon'=> 'success' , 'title'=> "Created is Successfully"] , 200);
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
           //
        $companies = Company::all();

           $companybranchs = CompanyBranch::findOrFail($id);
           return response()->view('cms.companybranch.show' , compact('companybranchs', 'companies'));

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
        $companies = Company::all();

        $companybranchs = CompanyBranch::findOrFail($id);

        return response()->view('cms.companybranch.edit' , compact( 'companybranchs' , 'companies'));
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
           //
           $validator = Validator($request->all(),[
            // 'name' => 'required|string|min:3|max:20',
            // 'code' => 'required|numeric|digits:3|unique:countries',
        ] , [
            // 'name.required' => 'هذا الحقل مطلوب' ,
            // 'name.min' => 'لا يقبل أقل من 3 حروف' ,
            // 'name.max' => 'لا يقبل أكثر من 20 حرف' ,
            // 'code.unique' => 'القيمة موجودة مسبقا',
        ]);

        if(! $validator->fails() ){
            $companybranchs = CompanyBranch::findOrFail($id);
            $companybranchs->name = $request->get('name');
            $companybranchs->email = $request->get('email');
            $companybranchs->password = $request->get('password');
            $companybranchs->status = $request->get('status');
            $companybranchs->description = $request->get('description');

            $isUpdate = $companybranchs->save();
            return ['redirect' =>route('companybranchs.index')];

            if($isUpdate){
                return response()->json(['icon'=> 'success' , 'title'=> "Created is Successfully"] , 200);
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
        $companybranchs= CompanyBranch::withTrashed()->find($id);

        if($companybranchs->deleted_at == null){
            $companybranchs = CompanyBranch::destroy($id);

            return response()->json(['icon' => 'success' , 'title' => "Deleted is successfully"] , 200);
        }

    //  function forceDelete

        if($companybranchs->deleted_at !== null){
            $companybranchs->forceDelete();

            return response()->json(['icon' => 'success' , 'title' => "Deleted is Data Base successfully"] , 200);
        }

    }
}

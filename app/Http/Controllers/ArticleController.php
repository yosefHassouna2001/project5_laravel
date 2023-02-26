<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\Article;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function indexArticle($id)
     {
         //
         $articles = Article::where('author_id', $id)->orderBy('id', 'desc')->paginate(5);
         return response()->view('cms.article.index', compact('articles','id'));
     }

     public function createArticle($id)
     {

        $categories = Category::where('status' , 'active')->get();
        $authors = Author::all();
        return response()->view('cms.article.create' , compact('categories' , 'authors' , 'id'));

     }


    public function index()
    {
        $articles = Article::orderBy('id' , 'desc')->paginate(5);
        return response()->view('cms.article.index' , compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status' , 'active')->get();
        $authors = Author::all();
        return response()->view('cms.article.create' , compact('categories' , 'authors'));
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
            // 'title' => 'string|min:3|max:15',
            // 'short_description' => 'string|min:10',
            // 'full_description' => 'string|max:1000',
            // 'image' => 'nullable' ,
          ] , [
            // 'title.required' => 'العنوان  مطلوب' ,
            // 'full_description.max' => 'الوصف الكامل لا يقبل أقل من 30 حروف' ,
            // 'short_description.min' => 'الوصف المختصر لا يقبل أكثر من 20 حرف' ,
            // 'image' => 'الصورة' ,

        ]);
        if(! $validator->fails()){

            $articles = new Article();
            if($request->hasFile('image')){
                $image = $request->file('image');;
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/article', $imageName);
                $articles->image = $imageName;
             }
            $articles->title = $request->input('title');
            $articles->short_description = $request->input('short_description');
            $articles->full_description = $request->input('full_description');
            $articles->author_id = $request->input('author_id');
            $articles->category_id = $request->input('category_id');

            $isSaved = $articles->save();

            return response()->json([
                'icon' => $isSaved ? 'success' : 'error' ,
                'title' => $isSaved ? "Created is Successfully" : "Created is Failed" ,
            ] , $isSaved ? 200 : 400);
        }
        else{
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ] , 400);
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
        $articles = Article::find($id);
        $categories = Category::where('status' , 'active')->get();
        $authors = Author::all();
        return response()->view('cms.article.show' , compact('articles' , 'categories' , 'authors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::findOrFail($id);
        $categories = Category::where('status' , 'active')->get();
        $authors = Author::all();

        return response()->view('cms.article.edit' , compact('articles' , 'categories' , 'authors'));
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
        $validator = validator($request->all() , [
            // 'title' => 'string|min:3|max:15',
            // 'short_description' => 'string|max:20',
            // 'full_description' => 'string|min:50',
            // 'image' => 'nullable' ,
          ] , [
            // 'title.required' => 'هذا الحقل مطلوب' ,
            // 'title.min' => 'لا يقبل أقل من 3 حروف' ,
            // 'title.max' => 'لا يقبل أكثر من 15 حرف' ,
            // 'full_description.min' => 'لا يقبل أقل من 30 حروف' ,
            // 'short_description.max' => 'لا يقبل أكثر من 20 حرف' ,
            // 'image' => 'الصورة' ,

        ]);

        if(! $validator->fails()){

            $articles = Article::findOrFail($id);

            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/article', $imageName);
                $articles->image = $imageName;
            }
            $articles->title = $request->input('title');
            $articles->short_description = $request->input('short_description');
            $articles->full_description = $request->input('full_description');
            $articles->author_id = $request->input('author_id');
            $articles->category_id = $request->input('category_id');

            $isUpdate = $articles->save();

            return ['redirect' =>route('articles.index')];
            // return ['redirect' =>route('indexArticle' , $id)];


            return response()->json([
                'icon' => $isUpdate ? 'success' : 'error' ,
                'title' => $isUpdate ? "Updated is Successfully" : "Updated is Failed" ,
            ] , $isUpdate ? 200 : 400);
        }
        else{
            return response()->json([
                'icon' => 'error' ,
                'title' => $validator->getMessageBag()->first(),
            ] , 400);
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
        $articles = Article::destroy($id);
    }
}

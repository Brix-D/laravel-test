<?php

namespace App\Http\Controllers;

//use App\Models\Service;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        // $service = Service::get();
        // return response()->json(['services' => $service]);
        $articles = Article::take(25)->get();
        return response()->json($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        if ($request->isJson()) {
            $form = $request->json()->all();
        } else {
            $form = $request->request->all();
        }
        $attributes = ['title' => $form['title'], 'content' => $form['content'], 'user_id' => $form['userID']];
        $article = new Article($attributes);
        $article->save();
        return response()->json($article, 201);
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

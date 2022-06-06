<?php

namespace App\Http\Controllers;

//use App\Models\Service;
use App\Models\Article;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        // $service = Service::get();
        // return response()->json(['services' => $service]);
        $articles = Article::with('likedByUsers')->take(25)->get();
        $articles = $articles->map(function ($item) {
            $article = $item->makeHidden('likedByUsers')->toArray();
            $article['likedByUsers'] = $item->likedByUsers;
            $article['likes'] = $item->likedByUsers->count();
            return $article;
        });
        return response()->json($articles);
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
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $article = Article::findOrFail($id);
            $user = $article->user;
            $response = array_merge($article->toArray(), ['user' =>$user]);
            return response()->json($response);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Not Found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        if ($request->isJson()) {
            $form = $request->json()->all();
        } else {
            $form = $request->request->all();
        }
        try {
            $article = Article::findOrFail($id);
            $article->title = $form['title'];
            $article->content = $form['content'];
            $article->user_id = $form['userID'];
            $article->save();
            return response()->json($article, 204);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Not Found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $article = Article::findOrFail($id);
            $article->delete();
            return response()->json([], 204);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Not Found'], 404);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    //
    public function index() {
        $services = Service::query()->orderBy('created_at', 'DESC')->take(2)->get();
        return view('welcome', compact('services'));
    }

    public function store(Request $request) {
        // example getting json body
        $form = json_decode($request->getContent(), true);

        //dd();

        $service = new Service();
        $service->title = $form['title'];
        $service->description = $form['description'];
        $service->cost = $form['cost'];
        $service->save();
        return view('welcome', compact($request));
    }

    public function edit(Request $request, $id) {
        $form = json_decode($request->getContent(), true);
        //dd($id);
        $service = Service::findOrFail($id);
        $service->title = $form['title'];
        $service->description = $form['description'];
        $service->cost = $form['cost'];
        $service->save();
        return view('welcome', compact($request));
    }
}

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
        dd(json_decode($request->getContent(), true));

        return view('welcome', compact($request));
    }
}

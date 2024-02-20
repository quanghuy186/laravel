<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('post.create');
    }

    public function store(PostRequest $request){
        return "complete";
    }
}
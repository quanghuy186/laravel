<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index(){
        return view('task');
    }

    function create(){
        return view('taskManager.create');
    }

    function store(){
        return view('taskManager.store');
    }

}
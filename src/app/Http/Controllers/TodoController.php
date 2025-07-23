<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();

        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = request()->all();

        $todo = new Todo();
        // dd($inputs);
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.index');
    }
    //    7/23 追加 
    public function show($id)
    {
        $model = new Todo();
        $todo = $model->find($id);
        // dd($todo);
        return view('todo.show', ['todo' => $todo]); 
    }
}

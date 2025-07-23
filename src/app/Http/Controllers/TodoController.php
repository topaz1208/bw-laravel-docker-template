<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    private $todo; // section17 追記 7/23
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        // $todo = new Todo();
        // $todos = $todo->all();
        $todos = $this->todo->all();
        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = request()->all();

        // $todo = new Todo();
        // $todo->fill($inputs);
        // $todo->save();
        $this->todo->fill($inputs); // 変更
        $this->todo->save(); // 変更
        return redirect()->route('todo.index');
    }
    //    7/23 追加 
    public function show($id)
    {
        // $model = new Todo();
        // $todo = $model->find($id);
        // dd($todo);
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }
}

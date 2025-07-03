<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo; // section8 追加

//section7 view関数で表示したいHTML（todo.index)を指定
class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();  // section8 追加
        $todos = $todo->all();  // section8 追加
       return view('todo.index', ['todos' => $todos]);
    }
}



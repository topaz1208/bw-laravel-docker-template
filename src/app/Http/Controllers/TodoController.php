<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// class TodoController extends Controller //section7 Controllerクラスを基にTodo Controllerクラスを作成
// {
//     //section7 indexメソッドを定義　dd関数で指定された値（Hello World!）を表示後に処理を終了
//     public function index()
//     {
//          return view('todo.index');
//     }
// }

//section7 view関数で表示したいHTML（todo.index)を指定
class TodoController extends Controller
{
    public function index()
    {
        return view('todo.index'); 
    }
}


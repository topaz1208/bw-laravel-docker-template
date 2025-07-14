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
    public function create()
    {
        // TODO: 第1引数を指定
        return view('todo.create'); // section11 追記
    }

    public function store(Request $request) //section14 追記
    {
        $inputs = $request->all(); // 変更
    
        $todo = new Todo();
        $todo->fill($inputs); // 変更
        $todo->save();

        return redirect()->route('todo.index');
    }


    // public function store(Request $request) //section13 追記
    // {
    //     $content = $request->input('content'); // section13 追記

    //     // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
    //     $todo = new Todo();
    //     // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
    //     $todo->content = $content;
    //     // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
    //     $todo->save();

    //     return redirect()->route('todo.index');
    // }
}

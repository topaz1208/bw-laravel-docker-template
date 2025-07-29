<?php

namespace App\Http\Controllers;
// use Illuminate\Http\Request; 
use App\Http\Requests\TodoRequest; // 追加
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
    
    public function store(TodoRequest $request)
    {
        $inputs = $request->all();
        
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
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }
    public function edit($id)
    {
        // TODO: 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得 7/23
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
        
    }
    
    // 7/24追加
    public function update(TodoRequest $request, $id) // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得　//Todoリクエストに修正
    {
        // TODO: リクエストされた値を取得
        $inputs = $request->all();
        // TODO: 更新対象のデータを取得
        $todo = $this->todo->find($id);
        // TODO: 更新したい値の代入とUPDATE文の実行
        $todo->fill($inputs)->save();
        // dd($todo);
        return redirect()->route('todo.show', $todo->id); // 追記
    }
    
    //7/29追加
    public function delete($id)
{
    // TODO: 削除対象のレコードの情報を持つTodoモデルのインスタンスを取得
    $todo = $this->todo->find($id);
    $todo->delete();
    return redirect()->route('todo.index');

}
}
    


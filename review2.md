# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか
inputタグ
<input type="hidden" name="_method" value="PUT"> 

### findメソッドの引数に指定しているIDは何のIDか
ルートパラメータのid

### findメソッドで実行しているSQLは何か
SELECT * FROM todos WHERE todos.id = （指定されたid) AND todos.deleted_at IS NULL LIMIT 1;

### findメソッドで取得できる値は何か
インスタンス化されたTodoモデル

### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか
モデルのインスタンスに主キー（idキー）があるか否か。
存在しない場合はINSERT、存在する場合はUPDATEとなる。
(データが変更された場合のみメソッドは実行される)

## Todo論理削除

### traitとclassの違いとは
traitは複数のクラスで共通のプロパティやメソッドを再使用するための仕組みであり、classはメソッド・プロパティを含むオブジェクトを生成する基本構造。
traitはインスタンス化出来ず、classに組み込むことで機能を追加する。

### traitを使用するメリットとは
複数クラスで共通のメソッドが使用可能になる。また、複数のtraitを使用することが可能。

## その他

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
ルーティングでTodoControllerが呼び出された時。（TodoControllerがインスタンス化した時）

### RequestクラスからFormRequestクラスに変更した理由
フォームから送信された値に対してバリデーション処理を適用するため。

### $errorsのhasメソッドの引数・返り値は何か
引数：フォーム名（name属性）
返り値：真偽値（bool）

### $errorsのfirstメソッドの引数・返り値は何か
引数:フィールド名（カラム名）
返り値：エラーメッセージ

### フレームワークとは何か
アプリケーション開発のために必要となる一般的な機能や定型モジュールをライブラリとして予め用意したもの。

### MVCはどういったアーキテクチャか
開発効率を高めるために、プログラムを「Model」「View」「Controller」の役割に分担したアーキテクチャ。

### ORMとは何か、またLaravelが使用しているORMは何か
オブジェクト指向プログラミングの機能を利用してリレーショナルデータベース内のデータを操作する仕組み。
これによりSQLを書かずにコードでデータベースの操作が出来る。
LaravelはEloquent ORMを使用。

### composer.json, composer.lockとは何か
composer.json：インストール対象のパッケージを定義するファイル。
composer.lock：インストールするパッケージのバージョンを定義するファイル。

### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか
vendorディレクトリ。

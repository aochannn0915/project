@session('title','ブログ詳細')
    @section('content')
    //<div class="container">
    <div class="row">
        <div class="col-md-8col-md-offset-2">
    <h1>画面詳細画面</h1>
    <table class="table table-striped">
       <thead>
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>メーカー名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>コメント</th>
            <th><input type="submit" value="新規登録"></th>
          <th><input type="submit" value="戻る"></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($productes as $productes)
  <table>
     <thead>
        <tr>
            <td>ID</td>
            <td>{{ $productes->product_name}}</td>
        </tr>
        <tr>
            <td>商品画像</td>
            <td>{{ $productes -> img_path}}</td>
        </tr>
        <tr>
            <td>商品名</td>
            <td>{{ $productes ->product_name}}</td>
        </tr>
        <tr>
            <td>メーカー</td>
            <td>{{ $productes ->company_id}}</td>
        </tr>
        <tr>
            <td>価格</td>
            <td>{{ $productes ->price }}</td>
        </tr>
        <tr>
            <td>在庫数</td>
            <td>{{ $productes -> stock}}</td>
        </tr>
        <tr>
            <td>コメント</td>
            <td>{{ $productes -> comment}}</td>
        </tr>
        @endforeach
    </thead>
  </table>

  @extends('layout,app')
    @section('content')

    //<div class="container">
    <div class="row">
        <div class="col-md-8col-md-offset-2">
    <h1>商品情報編集画面</h1>
    <table class="table table-striped">
  <table>
  @foreach ($productes as $productes)
    
     <thead>
        <tr>
            <td>ID</td>
            <td>{{ $productes -> id}}</td>
        </tr>
        <tr>
            <td>商品名</td>
            <td>{{ $productes ->product_name }}</td>
        </tr>
        <tr>
            <td>メーカー</td>
            <td>{{ $productes ->company-name}}</td>
        </tr>
        <tr>
            <td>価格</td>
            <td>{{ $productes ->price }}</td>
        </tr>
        <tr>
            <td>在庫数</td>
            <td>{{ $productes -> stock}}</td>
        </tr>
        <tr>
            <td>コメント</td>
            <td>{{ $productes -> comment}}</td>
        </tr>
        <tr>
            <td>商品画像</td>
            <td>{{ $productes -> img_path}}</td>
        </tr>
    @endforeach
    </thead>
  </table>
</div><form>

//詳ボタン
  public function Detail($id){
    $productes_model= new Productes($id);
    $productes = $productes_model->Detail();
    return view('detail', compact('productes'));
  }
//編集ボタン
  public function Edit($id){
    $productes_model= new Productes();
    $productes = $productes_model->Edit($id);
    return view('edit', compact('productes'));
  }
  
<td><a href="{{route('edit',['id'=> $productes->id])}}"><button type="button" class="btn btn-primary">編集</button></a></td>
<td><a href="{{route('edit',['id' => $productes->id])}}"><button type="button" class="btn btn-primary">編集</button></a></td>
Route::get('/list', [App\Http\Controllers\ProductesController::class, 'showList'])->name('list');//商品一覧画面
Route::get('/regist',[App\Http\Controllers\ProductesController::class, 'showRegist'])->name('regist');
Route::get('/detail', [App\Http\Controllers\ProductesController::class, 'showDetail'])->name('detail');
Route::get('/detail/{id}',[App\Http\Controllers\ProductesController::class, 'Detail'])->name('detail');//詳細追加
Route::get('/edit',[App\Http\Controllers\ProductesController::class, 'showEdit'])->name('edit');
Route::get('/edit/{id}/', [App\Http\Controllers\ProductesController::class, 'Edit'])->name('edit');//編集追加
Route::post('/update', [App\Http\Controllers\ProductesController::class, 'update'])->name('update');//更新
Route::get('/delete/{id}', [App\Http\Controllers\ProductesController::class, 'delete'])->name('delete');//削除
Route::post('/regist', [App\Http\Controllers\ProductesController::class, 'regist'])->name('regist');//新規登録
Route::get('/search', [App\Http\Controllers\ProductesController::class, 'search'])->name('search');//検索
//検索機能
  public function search(Request $request){
    DB::beginTransaction();
    try {
    $company_id = $request->input('company_id');
    $model = new Productes();
    $products = $model->searchProductes($company_id);
    DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        //return back();
    }
    return view('list');
  }
  //商品編集
  public function showEdit(){
    $conmanies=DB::table('companies')->get();
    $productes= new Productes();
    $productes = $productes->showEdit();
      return view('edit', ['productes' => $productes]);
  }
　　<a href="{{ route('regist') }}" method="POST"> 
　　<button type="submit" class="btn btn-primary btn-block">新規登録</button>
</form>
<form action="{{ route('regist') }}" method="POST">
                    @csrf
                    
                <td><button type="submit" class="btn btn-primary">新規登録</button></td>
//検索機能
  public function search(Request $request){
    DB::beginTransaction();
    try {
    $company_id = $request->input('company_id');
    $model = new Productes();
    $products = $model->searchProduct($company_id);
    DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        return back();
    }
    return redirect()->route('list');
  }
<form action="{{ route('update',['id'=>$productes->id])}}" method="post">
                                @csrf
                <td><button type="submit" class="btn btn-success">{{ __('更新') }}</button></td>
                <td><button type="button" onClick="history.back()">戻る</button></td>
                </form>
                           
<h1>商品情報編集画面</h1>
            <form action="center" method="post"></form>
                @csrf
                <table>
<button type="button"  onclick="a href='{{ route('regist') }}'>新規登録</button>    
<form action="{{ route('regist') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-block">新規登録</button>  
                                <button type="submit" class="btn btn-primary btn-block" onclick="location.href="{{ route('regist') }}">新規登録</button>    
                           </form>
<input type="submit" class="btn btn-primary value="新規登録">
<select input type="text" name="keyword" class="form-inline" id="company_name" name="company_name" placeholder="コカコーラー">
controller
//検索機能
  public function search(Request $request){
    $company_id = $request->input('company_id');
    $model = new Productes();
    $products = $model->searchProduct($company_id);
    return view('list', ['productes' => $productes]);
  }
Route::post('/update/{id}', [App\Http\Controllers\ProductesController::class, 'update'])->name('update');//更新
date-delete-id={{$productes_id}}
<input type="submit" class="btn btn-danger delete-btn" value="削除" date-delete-id={{$productes_id}}
///新規登録画面regist
    public function showRegist() {
        $productes = DB::table('productes')->get();
        return $productes;
    }
//<form action="{{ route('delete', ['id'=>$productes->id]) }}" method="POST"></form>
//詳細画面表示detail
  public function showDetail(){
    $productes= new Productes();
    $productes = $productes->getDetail();
    return view('detail', ['productes' => $productes]);
  }
  //詳ボタン
  public function showDetail($id){
    $productes_model= new Productes();
    $productes = $productes_model->showDetail($id);
    return view('productes.detail', compact('productes'));
  }
   //商品編集
  public function showEdit(){
    $conmanies=DB::table('companies')->get();
    $productes= new Productes();
    $productes = $productes->getEdit();
      return view('edit', ['productes' => $productes]);
  }
  ///編集ボタン
  public function showEdit($id){
    $productes_model= new Productes();
    $productes = $productes_model->showEdit($id);
    return view('productes.edit', compact('productes'));
  }
  
public function getSearch(){
    $productes = DB::table('productes')->get();
//検索
     public function getSearch(Request $id){  
     $model = new Productes();
     $products = $model->search();
     return view('list', ['productes' => $productes]);
}
<form> 
                           <a href="{{ route('regist') }}" method="GET"> </a>
                           <td><a href="{{route('regist',['id'=> $productes->id])}}"><button type="button" class="btn btn-primary">編集</button></a></td>
                           <td><button type="submit" class="btn btn-primary">新規登録</button></td>
                           </form>
<td><a href="{{route('detail',$productes->id}}"><button type="button" class="btn btn-success">詳細</button></a></td>
<td><a href="{{route('edit',['id'=> $productes->id])}}"><button type="button" class="btn btn-primary">編集</button></a></td>
//<button onclick="location.href='{{route{'lists'}}}'" class="btn btn-warning">戻る</button>
<th><input type="submit" value="新規登録"></th>
<td><a href="/productes/detail/{{$productes->id}}"><button type="button" class="btn btn-primary">詳細</button></a></td>
<td><a href="{{ route('productes.edit', ['id'=>$productes->product_id]) }}" class="btn btn-info">編集</a></td>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

@extends('app')
@section('title', '商品一覧画面')

@section('content')
    <div class="container">
        <div class="row">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <h1>商品一覧画面</h1>
                <div class="form-group">
                <form action="{{ route('search') }}" method="GET" enctype='multipart/form-data' >
                    @csrf
                    <input placeholder="検索キーワード" type="text" name="keyword">
                    <select class="company_id" id="company_id" name="company_id"> 
                        @foreach($companies as $company)
                        <option value="{{ $company -> id }}">{{ $company -> company_name }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="検索">  
                </form>
                </div>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>商品画像</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>メーカー名</th>
                        <th> <a href="{{route('regist')}}">新規登録</a></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>    
                        <td>{{ $product -> id }}</td>
                        <td>{{ $product -> img_path}}</td>
                        <td>{{ $product -> product_name }}</td>
                        <td>{{ $product -> price }}</td>
                        <td>{{ $product -> stock}}</td>
                        <td>{{ $product -> company_name}}</td>
                        <td>
                            <input type="button" value="詳細" 
                        onclick="location.href='{{route('detail',['id' => $product->id])}}'" >
                            <input type="button" value="削除" 
                        onclick="location.href='{{route('delete',['id' => $product->id])}}'" >
                        </td>   
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
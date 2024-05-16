@extends('app')
@section('title', '商品一覧画面')

@section('content')
    <div class="container">
        <div class="row">
         <h1>商品一覧画面</h1>
                <div class="form-group">
                <form action="{{ route('search') }}" method="GET">
                    @csrf
                    <input placeholder="検索キーワード" input type="text" name="keyword">
                    <select class="company_id" id="company_id" name="company_id"> 
                        @foreach($companies as $company)
                        <option value="{{ $company -> id }}">{{ $company -> company_name }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="検索">  
                </form>
                <link href="{{ asset('css/app.css') }}" rel="stylesheet">

            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>商品画像</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>メーカー名</th>
                        <th> 
                           <td><a href="{{route('regist')}}">新規登録</a></td>   
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($productes as $productes)
                    <tr>    
                        <td>{{ $productes -> id }}</td>
                        <td>{{ $productes -> img_path}}</td>
                        <td>{{ $productes -> product_name }}</td>
                        <td>{{ $productes -> price }}</td>
                        <td>{{ $productes -> stock}}</td>
                        <td>{{ $productes -> company_name}}</td>
                        <td><input type="button" value="詳細" 
                        onclick="location.href='{{route('detail',['id' => $productes->id])}}'" ></td>
                        <td><input type="button" value="削除" 
                        onclick="location.href='{{route('delete',['id' => $productes->id])}}'" ></td>   
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
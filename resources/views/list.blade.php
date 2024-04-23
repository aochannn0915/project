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
                        <th>ID</th>
                        <th>商品画像</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>メーカー名</th>
                        <th> 
                           <td><a href="{{route('regist')}}"method="post"></a><button type="button" class="btn btn-primary">新規登録</button></td>
                           
                        </th>
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
                        <td><a href="{{route('detail',['id'=>$productes->id])}}">詳細</a></td>
                        <td><a href="{{route('delete',['id'=>$productes->id]) }}" method="GET"></a></td>
                        <td>
                            <form action="{{route('delete',['id'=>$productes->id])}}" method="GET">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger delete-btn" value="削除">
                            </form>
                        </td>
                        
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
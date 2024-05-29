
@extends('app')

@section('title')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
         <link href="{{ asset('css/app.css') }}" href="stylesheet">
            <h1>商品情報詳細画面</h1>
            <table>
                <tr>
                <div class="form-group">
                   <td><label for="product_id">ID</label></td>
                   <td>{{ $products->id}}</td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="img_path">商品画像</label></td>
                    <td>{{$product->img_path}}</td>        
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="product_name">商品名</label></td>
                    <td>{{$product->product_name}}</td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="company_name">メーカー</label></td>
                    <td>{{$product->company_name}}</td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="price">価格</label></td>
                    <td>{{$product->price}}</td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="stock">在庫数</label></td>
                    <td>{{$product->stock}}</td>
                </div>
                </tr>
                <tr>
                    <div class="form-group">
                    <td><label for="comment">コメント</label></td>
                    <td>{{$product->comment}}</td>
                </div>
                </tr>
                <tr>
                    <div class="col-sm-offset-2 col-sm-10 text-left">
                    <td><a href="{{route('edit',['id'=> $product->id])}}">編集</a></td>
                    <td><a href="{{route('list') }}" class="btn btn-primary">戻る</a></td>
                    </div>
                </tr>
            </table>   
            
        </div>
    </div>
@endsection

    
            
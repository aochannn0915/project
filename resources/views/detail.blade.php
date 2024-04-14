
@extends('app')

@section('title')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <h1>商品情報詳細画面</h1>
            <form action="center" method="post"></form>
                @csrf
            
            <table>
                <tr>
                <div class="form-group">
                   <td><label for="product_name">ID</label></td>
                  <td>1.</td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="company_name">商品画像</label></td>
                    <td>{{$productes->img_path}}</td>        
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="price">商品名</label></td>
                    <td>{{$productes->product_name}}</td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="stock">メーカー</label></td>
                    <td>{{$productes->company_name}}</td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="comment">価格</label></td>
                    <td>{{$productes->price}}</td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="img_path">在庫数</label></td>
                    <td>{{$productes->stock}}</td>
                </div>
                </tr>
                <tr>
                    <div class="form-group">
                    <td><label for="comment">コメント</label></td>
                    <td>{{$productes->comment}}</td>
                </div>
                </tr>
                <tr>
                <div class="col-sm-offset-2 col-sm-10 text-left">
                <td><a href="{{route('edit',['id'=> $productes->id])}}"><button type="button" class="btn btn-primary">編集</button></a></td>
                <td><button type="button" onClick="history.back()">戻る</button></td>
                </div>
                </tr>
            </table>   
            </form>
        </div>
    </div>
@endsection

    
            
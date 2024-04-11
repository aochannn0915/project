
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
                    <td><label><input type="text" class="form-inline"id="img_path" name="img_path" placeholder="画像" ></td>             
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="price">商品名</label></td>
                    <td><input type="text" class="form-inline"id="product_name" name="product_name" placeholder="コーラー"> </td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="stock">メーカー</label></td>
                    <td><input type="text" class="form-inline" id="company_name" name="company_name" placeholder="コカコーラー"></td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="comment">価格</label></td>
                    <td><lavel><input type="text" class="form-inline"id="price" name="price" placeholder="¥130"></td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="img_path">在庫数</label></td>
                    <td><input type="text" class="form-inline"id="stock" name="stock" placeholder="6"></td>
                </div>
                </tr>
                <tr>
                    <div class="form-group">
                    <td><label for="comment">コメント</label></td>
                    <td><input textarea type="text" class="form-inline"id="comment" name="comment" placeholder="〇〇～" ></textarea></td>
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

    
            
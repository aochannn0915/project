@extends('app')

@section('title','商品新規登録')

@section('content')
    <div class="container">
        <div class="row">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <h1>商品新規登録画面</h1>
            <form class="center" action="" method="get">
            <form action="{{ route('submit') }}" method="post">
              @csrf
               <table>
                <tr>
                <div class="form-group">
                    <td><label for="product_name">商品名*</label></td>
                    <td><input type="text" class="form-inline"id="product_name" name="product_name"></td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="company_id">メーカー名*</label></td>
                    <td><select class="company_id" id="company_id" name="company_id">
                    
                        @foreach($companies as $company)
                        <option value="{{ $company -> id }}">{{ $company -> company_name }}</option>
                        @endforeach
                    </select> </td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="price">価格*</label></td>
                    <td><lavel><input type="text" class="form-inline"id="price" name="price"></td> 
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="stock">在庫数*</label></td>
                    <td><input type="text" class="form-inline"id="stock" name="stock"></td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="comment">コメント</label></td>
                    <td><input textarea type="text" class="form-inline"id="comment" name="comment"></textarea></td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="img_path">商品画像</label></td>
                    <form action="route('regist')" method="GET" enctype='multipart/form-data'>
	                <td><input type="file" name="image"></form></td>
                </div>
                </tr>
                <div>
                <form> 
                <a href="{{ route('list') }}" method="GET">
                    <td><button type="submit" class="btn btn-primary">新規登録</button></td>
                    <td><button type="button" onClick="history.back()">戻る</button></td>
                </form>
                </table>
            </form>
        </div>
    </div>
@endsection
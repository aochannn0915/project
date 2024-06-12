@extends('app')

@section('title','商品新規登録')

@section('content')
    <div class="container">
        <div class="row">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <h1>商品新規登録画面</h1>
            
               <table>
               <form action="{{route('submit')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <tr>
                <div class="form-group">
                    <td><label for="product_name">商品名*</label></td>
                    <td><input type="text" class="form-inline" name="product_name" value="{{old('product_name')}}"></td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="company_name">メーカー名*</label></td>
                    <td><select class="company_name"  name="company_name">
                        @foreach($companies as $company)
                        <option value="{{ $company -> id }}">{{ $company -> company_name }}</option>
                        @endforeach
                       </select> </td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="price">価格*</label></td>
                    <td><lavel><input type="text" class="form-inline" name="price" value="{{old('price')}}"></laravel></td> 
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="stock">在庫数*</label></td>
                    <td><input type="text" class="form-inline" name="stock" value="{{old('stock')}}"></td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="comment">コメント</label></td>
                    <td><input textarea type="text" class="form-inline"id="comment" name="comment" value="{{old('comment')}}"></textarea></td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="img_path">商品画像</label></td>
	                <td><input type="file" name="image" value="{{old('img_path')}}"></td>
                </div>
                </tr>
                <div>
                    <td><input type="button" value="戻る" 
                        onclick="location.href='{{route('list')}}'" ></td>
                        <td><input type="submit" value="新規登録" ></td>
                   </form>
                </table>
            
        </div>
    </div>
@endsection
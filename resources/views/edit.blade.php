@extends('app')

@section('title','商品編集画面')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <link href="{{ asset('css/app.css') }}" ref="stylesheet">
        
            <h1>商品情報編集画面</h1>
            <form action="{{ route('update', ['id' => $products->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <table>
              <tr>
                
                    <td><label for="id">id</label></td>
                    <td>{{ $products->id }}</td> 
              </tr>
              <tr>
            
                    <td><label for="product_name">商品名*</label></td>
                    <td><input type="text" class="form-inline"  name="product_name" value="{{old('product_name')}}"></td>
              </tr>
              <tr>
                    <td> <label for="company_name">メーカー名*</label></td>
                    <td>
                    <select class="company_name" name="company_name"> 
                        @foreach($companies as $company)
                        <option value="{{ $companies -> id }}">{{ $companies -> company_name }}</option>
                        @endforeach
                    </select>
                    </td>
              </tr>
              <tr>
                    <td><label for="price">価格*</label></td>
                    <td><input type="text" class="form-inline" name="price" value="{{old('price')}}"></td>
              </tr>
              <tr>
                    <td><label for="stock">在庫数*</label></td>
                    <td><input type="text" class="form-inline" name="stock" value="{{old('stock')}}"></td> 
              </tr>
              <tr>
                    <td><label for="comment">コメント</label></td>
                    <td><input type="text" class="form-inline"name="comment" value="{{old('comment')}}"></td>
              </tr>
              <tr>
                
                    <td><label for="img_path">商品画像</label></td>
                    <a href="route('edit')" enctype='multipart/form-data' value="{{old('img_path')}}"></a>
	                <td><input type="file" name="image"></td>
              </tr>
              <tr>
                <!-- <form action="{{route('update')}}" method="POST">更新 -->
                <td><a href="{{route('detail',['id' => $product->id])}}" class="btn btn-primary">戻る</a></td>   
              </tr>    
                </form>
            </table>
            
        </form>
    </div>
@endsection


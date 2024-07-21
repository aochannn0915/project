@extends('app')
@section('title','商品編集画面')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
            <h1>商品情報編集画面</h1>
            <form action="{{ route('updateSubmit',['id' => $products-> id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <table>
              <tr>
                    <td><label for="id">id</label></td>
                    <td>{{ $products->id }}</td>
                    @if($errors->has('id'))
                        <p>{{ $errors->first('id') }}</p>
                    @endif
              <tr>
                    <td><label for="product_name">商品名*</label></td>
                    <td><input type="text" class="form-inline"  name="product_name" value="{{$products -> product_name}}"></td>
                    @if($errors->has('product_name'))
                        <p>{{ $errors->first('product_name') }}</p>
                    @endif              
             </tr>
              <tr>
                    <td> <label for="company_name">メーカー名*</label></td>
                    <td>
                    <select class="company_name" name="company_name"> 
                        @foreach($companies as $company)
                        <option value="{{ $company -> name }}"></option>
                        @endforeach
                    </select>
                    </td>
              </tr>
              <tr>
                    <td><label for="price">価格*</label></td>
                    <td><input type="text" class="form-inline" name="price" value="{{$products -> price}}"></td>
                    @if($errors->has('price'))
                        <p>{{ $errors->first('price') }}</p>
                    @endif
              </tr>
              <tr>
                    <td><label for="stock">在庫数*</label></td>
                    <td><input type="text" class="form-inline" name="stock" value="{{$products -> stock}}"></td> 
                    @if($errors->has('stock'))
                        <p>{{ $errors->first('stock') }}</p>
                    @endif
              </tr>
              <tr>
                    <td><label for="comment">コメント</label></td>
                    <td><input type="text" class="form-inline"name="comment" value="{{$products -> comment}}"></td>
                    @if($errors->has('comment'))
                        <p>{{ $errors->first('comment') }}</p>
                    @endif
              </tr>
              <tr>
                
                    <td><label for="img_path">商品画像</label></td>
                    <a href="route('updateSubmit)" enctype='multipart/form-data' value="{{$products ->img_path}}"></a>
	                <td><input type="file" name="image"></td>
              </tr>
              <tr>
                <td><a href="{{route('detail',['id' => $products-> id])}}" class="btn btn-primary">戻る</a></td>
                <td><button type="submit" class="btn btn-success">更新</button></td>
              </tr>      
            </table>
            </form>
       </div>
    </div>
@endsection


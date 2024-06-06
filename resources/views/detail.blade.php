
@extends('app')

@section('title')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
        
            <h1>商品情報詳細画面</h1>
            <table>
                <tr>
                <div class="form-group">
                   <td><label for="product_id">ID</label></td>
                   <td>{{ $products->id }}</td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="img_path">商品画像</label></td>
                    <td>{{ $products->img_path }}</td>        
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="product_name">商品名</label></td>
                    <td>{{ $products->product_name }}</td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="company_name">メーカー</label></td>
                    <td>{{ $products->company_name }}</td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="price">価格</label></td>
                    <td>{{ $products->price }}</td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="stock">在庫数</label></td>
                    <td>{{ $products->stock }}</td>
                </div>
                </tr>
                <tr>
                    <div class="form-group">
                    <td><label for="comment">コメント</label></td>
                    <td>{{ $products->comment }}</td>
                </div>
                </tr>
                <tr>
                    <div class="col-sm-offset-2 col-sm-10 text-left">
                         <td><input type="button" value="編集" 
                         onclick="location.href='{{route('edit')}}'"></td> 
                         <td><input type="button" value="戻る" 
                        onclick="location.href='{{route('list')}}'" ></td>
                      
                    </div>
                        
                </tr>
          
            </table>   
            
        </div>
    </div>
@endsection

    
            
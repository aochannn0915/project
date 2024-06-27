
@extends('app')

@section('title','商品情報詳細画面')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>商品情報詳細画面</h1>
            <form action="{{ route('edit', ['id' => $products->id]) }}" method="GET" enctype='multipart/form-data'>
             @csrf
            <table>
                <tr>
                   <td><label for="product_id">ID</label></td>
                   <td>{{ $products-> id }}</td>
                </tr>
                <tr>
                    <td><label for="img_path">商品画像</label></td>
                    <td>{{ $products-> img_path }}</td>        
                </tr>
                <tr>
                    <td><label for="product_name">商品名</label></td>
                    <td>{{ $products-> product_name }}</td>
                </tr>
                <tr>
                    <td><label for="company_name">メーカー</label></td>
                    <td>{{ $products-> company_name }}</td>
                </tr>
                <tr>
                    <td><label for="price">価格</label></td>
                    <td>{{ $products-> price }}</td>
                </tr>
                <tr>
                    <td><label for="stock">在庫数</label></td>
                    <td>{{ $products-> stock }}</td>
                </tr>
                <tr>
                    <td><label for="comment">コメント</label></td>
                    <td>{{ $products-> comment }}</td>
                </tr>
                <tr>
                         <td><input type="button" value="戻る" 
                        onclick="location.href='{{route('list')}}'"></td>
                        <td><input type="submit" value="編集"></td>
                </tr>
            </table> 
            </form>          
        </div>
    </div>
@endsection

    
            
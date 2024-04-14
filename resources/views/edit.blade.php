@extends('app')

@section('title')

@section('content')
    <div class="container">
        <div class="row">
        <div class="row justify-content-center">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
            <h1>商品情報編集画面</h1>
                <table>
                <tr>
                <div class="form-group">
                    <td><label for="product_name">ID</label></td>
                    <td>1.</td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="price">商品名*</label></td>
                    <td><input type="text" class="form-inline" id="product_name" name="product_name"></td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                   <td> <label for="stock">メーカー名*</label></td>
                  <td><select input type="text" name="keyword" >
                        <option value="メーカー名">メーカー名</option>
                        <option value="コカ・コーラ">コカ・コーラ</option>
                        <option value="サントリー">サントリー</option>
                        <option value="キリン">キリン</option>
                        <option value="伊右衛門">茶</option>
                      </select></td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="comment">価格*</label></td>
                    <td><input type="text" class="form-inline"id="price" name="price"></td>
                </div>
                </tr>
                <tr>
                <div class="form-group">
                    <td><label for="img_path">在庫数*</label> </td>
                    <td><input type="text" class="form-inline"id="stock" name="stock"></td> 
                </div>
                </tr>
                <tr>
                    <div class="form-group">
                    <td><label for="comment">コメント</label></td>
                    <td><input type="text" class="form-inline"id="comment" name="comment" ></td>
                </div>
                </tr>
                <tr>
                </form>
                    <div class="form-group">
                    <td><label for="img_path">商品画像</label></td>
                    <form action="route('edit')" method="POST" enctype='multipart/form-data'>
	                <td><input type="file" name="image">
                </form></td>
                </tr>
                </div>
                </tr>
                <form>
                <a href="{{ route('update')}}" method="post">
                <td><button type="submit" class="btn btn-success">更新</button></td>
                <td><button type="button" onClick="history.back()">戻る</button></td>
                </form>
                           
                </table>
            </form>
        </div>
    </d
@endsection


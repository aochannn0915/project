@extends('app')
@section('title', '商品一覧画面')

@section('content')
    <div class="container">
        <div class="row">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <h1>商品一覧画面</h1>
                <div class="form-group">
                <form action="{{ route('list') }}" method="GET" enctype='multipart/form-data' >
                    @csrf
                    <input placeholder="検索キーワード" type="text" name="keyword" >
                    <select class="company_id" id="company_id" name="company_id"> 
                    <option value="" placeholder="メーカー名"></option>
                        @foreach($companies as $company)
                        <option value="{{ $company -> id }}">{{ $company -> company_name }}</option>
                        @endforeach
                       
                    </select>
                    <input type="submit" value="検索">  
                </form>
        
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>商品画像</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>メーカー名</th>
                        <th> <a href="{{route('regist')}}">新規登録</a></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>    
                        <td>{{ $product -> id }}</td>
                        <td><img src="{{asset($product -> img_path) }}" alt="" width="100px"></td>
                        <td>{{ $product -> product_name }}</td>
                        <td>{{ $product -> price }}</td>
                        <td>{{ $product -> stock}}</td>
                        <td>{{ $product -> company_name}}</td>
                        <td>
                            <input type="button" value="詳細" 
                        onclick="location.href='{{route('detail',['id' => $product->id])}}'" >
                         <td><form action="{{ route('deleteProduct', ['id' => $product->id]) }}" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                   <input type="submit" value='削除' class='btn btn-outline-danger' onClick='return deleteAlert();'>
                             </form>
                         </td>
                          
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function deleteAlert() {
            return confirm('削除します。よろしいですか？');
        }
    </script>
@endsection
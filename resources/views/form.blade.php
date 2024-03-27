    ,<div>
     
       <h1>商品新規登録画面</h1>
       <table>
       <thead>
        <tr>
            
           
            <th>商品名</th>
            <th>メーカー名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>コメント</th>
            <th>商品画像</th>
            <button type="submit" class="btn btn-primary btn-block">新規登録</button>
            <button type="button" onClick="history.back()">戻る</button>
        </tr>
       
    </thead>
    <tbody>
    @foreach ($productes as $productes)
        <tr>
            <td>商品名</td>
            <td>{{ $productes->product_name }}</td>
        </tr>
        <tr>
            <td>メーカー</td>
            <td>{{ $productes ->company_id}}</td>
        </tr>
        <tr>
            <td>価格</td>
            <td>{{ $productes ->price }}</td>
        </tr>
        <tr>
            <td>在庫数</td>
            <td>{{ $productes -> stock}}</td>
        </tr>
        <tr>
            <td>コメント</td>
            <td>{{ $productes -> comment}}</td>
        </tr>
        <tr>
            <td>商品画像</td>
            <td>{{ $productes -> img_path}}</td>
        </tr>
    @endforeach
    </thead>
  </table>
</div>
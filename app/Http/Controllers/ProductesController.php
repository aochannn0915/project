<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productes;
use App\Models\Companies;
use App\Models\Sales;
use App\Http\Requests\ProductesRequest;
use Illuminate\Support\Facades\DB;

class ProductesController extends Controller
{
  //login 
  public function login(){
    $model= new Productes();
    $productes = $model->login();
    return view('auth.login', ['productes' => $productes]);
  }
  //register
  public function register(){
    $model= new Productes();
    $productes = $model->register();
    return view('auth.register', ['productes' => $productes]);
  }
  //リレーション
  public function showRelation(){
    $model = new Productes();
    $productes = $model->show();
    return view('list', ['productes' => $productes]);
  }
  //一覧画面表示
  public function showList(){
    $product_model= new Productes();
    $productes = $product_model->showRelation();
    $company_model= new Companies();
    $companies = $company_model->getAll();
    //$productes = Product::with('company')->get();
    return view('list',['productes' => $productes,'companies' => $companies]);
  }
  //検索機能
  public function search(Request $request){
    $company_id = $request->input('company_id');
    $keyword=$request->input('keyword');
    $model = new Productes();
    $company_model= new Companies();
    $companies = $company_model->getAll();
    $productes=$model->searchProductes($keyword,$company_id);
    return view('list',['productes' => $productes,'companies' => $companies]);
  }

  //新規登録画面regist
  public function Regist(){
    $productes_model= new Productes();
    $productes = $productes_model->Regist();
    return view('regist', ['productes' => $productes]);
  }
        //詳細ボタン
      //public function show($id) {
      //$productes = Productes::find($id);
      //return view('detail', compact('detail'));
  //}
  
  //更新
  public function upDate(Request $request,$id){
    $productes = Productes::find;
    $updateList = $this->productes->updateList($request, $productes);
    return redirect()->route('list');
  }     
  
  //新規登録
  public function insertProduct(Request $request){
    DB::beginTransaction();
    try {
    $model = new Productes();
    $model->insertProduct($request);
    DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        //return back();
    }
    return redirect()->route('regist');
  }
  //詳細画面表示detail
  public function showDetail($id){
    $productes_model= new Productes();
    $productes = $productes_model->getDetail($id);
    return view('detail', ['productes' => $productes]);
  }
  //詳ボタン
  // public function Detail($id){
  //   $productes_model= new Productes();
  //   $productes = $productes_model->Detail($id);
  //   return view('detail', ['productes' => $productes]);
  // }
   //商品編集
  public function showEdit($id){
    $productes_model= new Productes();
    $productes = $productes_model->getEdit($id);
      return view('edit', ['productes' => $productes]);
  }
  ///編集ボタン
  // public function Edit($id){
  //   $productes_model= new Productes();
  //   $productes = $productes_model->Edit(id);
  //   return view('edit', ['productes' => $productes]);
  // }
  
   
   ///更新
  public function updateProductes(Request $request, $id){
    DB::beginTransaction();
    try {
    $model = new Productes();
    $model->updateProductes($request, $id);
    DB::commit();
  } catch (\Exception $e) {
      DB::rollback();
      //return back();
  }
    return redirect()->route('edit');
 }
  //削除
 
  public function delete($id){
    DB::beginTransaction();
    try {
      $model = new Productes();
      $model->deleteProductes($id);
      DB::commit();
    }catch (Exception $e) {
      DB::rollback();
      
    }
    return redirect()->route('list');
    
  }  
    public function Image(Request $request) {
      //①画像ファイルの取得
      $image = $request->file('image');
      
      //②画像ファイルのファイル名を取得
      $file_name = $image->getClientOriginalName();
      
      //③storage/app/public/imagesフォルダ内に、取得したファイル名で保存
      $image->storeAs('public/images', $file_name);
      
      //④データベース登録用に、ファイルパスを作成
      $image_path = 'storage/images/' . $file_name;

      //モデルのインスタンス化
      $model = new Productes();

      //トランザクション開始
            DB::beginTrasnsaction();
      try{
        //⑤モデルのregistArticle関数を呼び出し。
        $model->registProductes($image_path);
        DB::commit();
      }catch(Exception $e){
        DB::rollBack();
      }
    }
}
   
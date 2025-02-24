<?php

use App\Http\Controllers\BTController;
use App\Http\Controllers\ThucTapController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Route::view('/chao', 'xinchao');

Route::get('/chuc', function () {
    $str = "Chúc mừng năm mới ";
    $t = "Chào bạn ";
    return view('chuc', ['title' => $t, 'content' => $str]);
});

Route::get('/cong/{a}/{b}', [ThucTapController::class, 'cong2so']);

Route::get('/home', function () {
    return view('home');
});

Route::get('/lienhe', function(){
    return view('lienhe');
});

Route::get('/loikhuyen', [ThucTapController::class, 'loikhuyen']);


Route::get('/lt', function(){
    $kq = DB::table('loaitin')->select('id', 'ten')->get();
    return view('lt', ['kq' => $kq]);
});

Route::get('/tich/{a}/{b}', [BTController::class, 'tich2so']);


Route::get('/db1', function () {
    $query = DB::table('tin')->select('*')->first();
    print_r($query);

});

Route::get("/db2/", function()
{
    $query = DB::table("loaitin")
    ->select("id", "ten");
    $kq = $query->get();
    foreach ($kq as $row){
        echo "<p> {$row->ten} </p>";
    }
});

Route::get("/db3/", function()
{
    $t = DB::table("loaitin")
    ->where('id', '=', 3)
    ->value('ten');
    echo $t;
});

Route::get("/db4/", function()
{
    $arr = DB::table("loaitin")
    ->pluck('ten');
    foreach ($arr as $row){
        echo "<p> {$row} </p>";
    }
});

Route::get("/db5/", function()
{
    $sotin = DB::table("tin")
    ->where('noibat', 1)
    ->count();
    echo "Số tin nổi bật: $sotin <br>";

    $mn = DB::table("tin")
    ->max("ngayDang");
    echo "Tin mới nhất đăng ngày: $mn <br>";

    $sn = DB::table("tin")
    ->min("ngayDang");
    echo "Tin cũ nhất đăng ngày: $sn <br>";

    $tb = DB::table("tin")
    ->avg("xem");
    echo "Xem trung bình: $tb <br>";

    $tong = DB::table("tin")
    ->sum("xem");
    echo "Tổng số lượt xem: $tong <br>";
});

Route::get("/db6/", function()
{
    $kq = DB::table("loaitin")
    ->where('id', 1111)
    ->exists();
    if(!$kq){
        echo "Có tồn tại loại tin có id này";
    }
});

Route::get("/db7/", function()
{
    $query = DB::table("loaitin")
    ->where('anHien', 1)
    ->orderBy('ten','desc')
    ->offset(5)
    ->limit(10);
    $kq = $query->get();
    foreach($kq as $row){
        echo "<p> {$row->ten} </p>";
    }
});

Route::get("/db8/", function()
{
    $query = DB::table("tin")
    ->join("loaitin","tin.idLT","=","loaitin.id")
    ->select("tin.id", "tin.tieuDe", "loaitin.ten");
    $kq = $query->get();
    foreach($kq as $row){
        echo "<p> {$row->tieuDe} - {$row->ten} </p>";
    }
});

Route::get("/db9/", function()
{
    $t = DB::table("tin")
    ->insert(['tieuDe' => 'Việt Nam Vô Địch', 'idLT' => 1]);
    echo $t;
});

Route::get("/db10/", function()
{
    $id = DB::table("tin")
    ->insertGetId(['tieuDe' => 'Việt Nam Vô Địch AFF']);
    echo "ID vừa insert: $id";
});

Route::get("/db11/", function()
{
    $t = DB::table("tin")->insert(
        [
            ["TieuDe"=> "Việt Nam mến yêu", "idLT"=> 1],
            ["TieuDe"=> "Việt Nam vô địch", "idLT"=> 1],
        ]);
        echo $t;
});

Route::get("/db12/", function()
{
    $t = DB::table("tin")->where("id","=",800)
    ->update(["TieuDe"=> "Việt Nam tuyệt vời", "idLT"=> 3]);
    echo $t;
});

Route::get("/db13/", function()
{
    $t = DB::table("tin")->where("id","=",802)->delete();
    echo $t;
});

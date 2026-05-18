<?php
/*
|--------------------------------------------------------------------------
| BASE CONTROLLER
|--------------------------------------------------------------------------
| Class dasar MVC yang menyediakan helper untuk memanggil view dan model.
| Semua controller turunan memakai class ini agar struktur project tetap rapi.
|
*/
// Base class yang dipakai controller lain untuk mengakses layer view dan model.
class Controller {
    /*
    |--------------------------------------------------------------------------
    | RENDER VIEW
    |--------------------------------------------------------------------------
    | Memuat file view dari folder views dan membawa array data ke file tersebut.
    |
    */
    public function view($view, $data = []) {
        require_once 'views/' . $view . '.php';
    }

    /*
    |--------------------------------------------------------------------------
    | LOAD MODEL
    |--------------------------------------------------------------------------
    | Memuat class model dari folder models lalu mengembalikan instance-nya.
    |
    */
    public function model($model) {
        require_once 'models/' . $model . '.php';
        return new $model();
    }
}
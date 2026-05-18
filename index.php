<?php
/*
|--------------------------------------------------------------------------
| PROJECT ENTRY POINT PHP MVC
|--------------------------------------------------------------------------
| File ini menjadi entry point PHP untuk menjalankan HomeController.
| Struktur MVC tetap dijaga karena routing utama diarahkan ke controller.
|
*/
// Memuat controller utama yang akan merender landing page ZGentara Trip.
require_once __DIR__ . '/controller/HomeController.php';

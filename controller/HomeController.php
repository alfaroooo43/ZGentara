<?php
/*
|--------------------------------------------------------------------------
| HOME CONTROLLER
|--------------------------------------------------------------------------
| Controller ini menjadi pintu masuk halaman utama pada pola MVC.
| Data diambil dari model, disiapkan menjadi array view, lalu dikirim
| ke header, home, dan footer tanpa mengubah struktur tampilan.
|
*/
// Menetapkan root project agar include file MVC tetap stabil dari folder controller.
chdir(__DIR__ . '/../');
// Memuat base Controller untuk akses method view() dan model().
require_once 'core/Controller.php';

/*
|--------------------------------------------------------------------------
| CLASS HOME CONTROLLER
|--------------------------------------------------------------------------
| Class ini mewarisi base Controller dan mengatur alur data landing page.
|
*/
class HomeController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | METHOD INDEX
    |--------------------------------------------------------------------------
    | Mengambil filter dari query string, memanggil model, menyiapkan base URL,
    | lalu merender view utama website.
    |
    */
    public function index() {
        // Memanggil model menu sebagai sumber data destinasi, tentang, dan testimoni.
        $menuModel = $this->model('menu');

        // Query GET dipakai untuk menjaga filter destinasi tetap bekerja pada MVC.
        $pilihVibe = $_GET['vibe'] ?? 'all';
        $pilihSearch = $_GET['search'] ?? '';

        $jastrip = $menuModel->getJastrip($pilihVibe, $pilihSearch);
        $tentang = $menuModel->getTentangKami();
        $testimoni = $menuModel->getTestimoni();

        // Base URL dibuat dinamis agar asset tetap benar di localhost maupun subfolder.
        $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
        $scriptDir = dirname($scriptName);
        $scriptDir = ($scriptDir === '.' || $scriptDir === '\\') ? '' : str_replace('\\', '/', $scriptDir);
        $baseUrl = preg_replace('#/controller$#', '', $scriptDir);
        $baseUrl = ($baseUrl === '/' || $baseUrl === 'controller') ? '' : rtrim($baseUrl, '/');

        if ($baseUrl === '' && PHP_SAPI === 'cli') {
            $baseUrl = '/' . basename(getcwd());
        }

        // Semua data view dikumpulkan dalam satu array agar view tetap sederhana.
        $data = [
            'title' => 'ZGentara Trip',
            'base_url' => $baseUrl,
            'asset_base' => $baseUrl . '/assets',
            'jastrip' => is_array($jastrip) ? $jastrip : [],
            'tentang' => is_array($tentang) ? $tentang : [
                'deskripsi' => '',
                'tim' => []
            ],
            'testimoni' => is_array($testimoni) ? $testimoni : [],
            'aktif_vibe' => $pilihVibe,
            'aktif_search' => $pilihSearch
        ];

        // Guard sederhana supaya section tim tidak error saat data model kosong.
        if (!isset($data['tentang']['tim']) || !is_array($data['tentang']['tim'])) {
            $data['tentang']['tim'] = [];
        }

        // Render urutan view MVC: header, konten utama, lalu footer.
        $this->view('header', $data);
        $this->view('home', $data);
        $this->view('footer', $data);
    }
}

// Bootstrap controller untuk menjalankan landing page saat file ini dipanggil.
$app = new HomeController();
$app->index();

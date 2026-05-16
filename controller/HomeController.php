<?php
chdir(__DIR__ . '/../');
require_once 'core/Controller.php';

class HomeController extends Controller {
    public function index() {
        $menuModel = $this->model('menu');

        $pilihVibe = $_GET['vibe'] ?? 'all';
        $pilihSearch = $_GET['search'] ?? '';

        $jastrip = $menuModel->getJastrip($pilihVibe, $pilihSearch);
        $tentang = $menuModel->getTentangKami();
        $testimoni = $menuModel->getTestimoni();

        $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
        $scriptDir = dirname($scriptName);
        $scriptDir = ($scriptDir === '.' || $scriptDir === '\\') ? '' : str_replace('\\', '/', $scriptDir);
        $baseUrl = preg_replace('#/controller$#', '', $scriptDir);
        $baseUrl = ($baseUrl === '/' || $baseUrl === 'controller') ? '' : rtrim($baseUrl, '/');

        if ($baseUrl === '' && PHP_SAPI === 'cli') {
            $baseUrl = '/' . basename(getcwd());
        }

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

        if (!isset($data['tentang']['tim']) || !is_array($data['tentang']['tim'])) {
            $data['tentang']['tim'] = [];
        }

        $this->view('header', $data);
        $this->view('home', $data);
        $this->view('footer', $data);
    }
}

$app = new HomeController();
$app->index();

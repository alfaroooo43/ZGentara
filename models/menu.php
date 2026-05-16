<?php
class Menu {
    public function getJastrip($vibe = 'all', $search = '') {
        $semuaTrip = [
            // Hardcore Adventure
            [
                'nama' => 'Gunung Raung',
                'vibe' => 'Hardcore Adventure',
                'foto' => 'GunungRaung.png',
                'deskripsi' => 'Jalur pendakian ekstrem yang menantang fisik dan mental demi puncak sejati.'
            ],
            [
                'nama' => 'Gunung Piramida',
                'vibe' => 'Hardcore Adventure',
                'foto' => 'GunungPiramidaBondowoso.png',
                'deskripsi' => 'Puncak ikonik dengan jalur punggungan tipis yang memacu adrenalin.'
            ],
            [
                'nama' => 'Gunung Rante',
                'vibe' => 'Hardcore Adventure',
                'foto' => 'GunungRante.png',
                'deskripsi' => 'Tantangan tanjakan berpasir dengan panorama kaldera yang memukau.'
            ],
            // Chill & Healing
            [
                'nama' => 'Kawah Wurung',
                'vibe' => 'Chill & Healing',
                'foto' => 'KawahWurung.png',
                'deskripsi' => 'Hamparan sabana hijau nan sejuk, sangat pas untuk bersantai menyeduh kopi.'
            ],
            [
                'nama' => 'Bukit Teletubbies',
                'vibe' => 'Chill & Healing',
                'foto' => 'BukitTeletubbies.png',
                'deskripsi' => 'Gugusan bukit bergelombang yang memanjakan mata untuk melepaskan penat.'
            ],
            [
                'nama' => 'Air Terjun Tancak Kembar',
                'vibe' => 'Chill & Healing',
                'foto' => 'AirTerjunTancakKembar.png',
                'deskripsi' => 'Dua aliran air terjun berdampingan di lereng gunung yang asri dan menyegarkan.'
            ],
            [
                'nama' => 'Niagara Mini',
                'vibe' => 'Chill & Healing',
                'foto' => 'NiagaraMiniBondowoso.png',
                'deskripsi' => 'Aliran air terjun belerang yang unik di tengah rimbunnya flora khas dataran tinggi.'
            ],
            // Golden Hour Spot
            [
                'nama' => 'Kawah Ijen',
                'vibe' => 'Golden Hour Spot',
                'foto' => 'BlueFireIjenBondowoso.png',
                'deskripsi' => 'Mengejar fenomena magis Blue Fire dan kehangatan sunrise terindah.'
            ],
            [
                'nama' => 'Blue Fire Ijen',
                'vibe' => 'Golden Hour Spot',
                'foto' => 'BlueFireIjenBondowoso.png',
                'deskripsi' => 'Fenomena api biru legendaris dengan suasana dini hari yang magis dan berkesan.'
            ],
            [
                'nama' => 'Bukit Megasari',
                'vibe' => 'Golden Hour Spot',
                'foto' => 'BukitMegasariParalayang.png',
                'deskripsi' => 'Spot terbaik menikmati pemandangan lanskap Bondowoso dari ketinggian saat senja.'
            ]
        ];

        // LOGIKA PENYARINGAN MURNI FLEKSIBEL
        $hasilFilter = [];
        
        // 1. Bersihkan inputan dari spasi depan/belakang dan ubah ke huruf kecil semua
        $searchClean = strtolower(trim($search));
        $vibeClean   = strtolower(trim($vibe));

        foreach ($semuaTrip as $trip) {
            // 2. Bersihkan string vibe dari array model agar perbandingannya setara
            $tripVibeClean = strtolower(trim($trip['vibe']));
            
            // Cek Vibe: Lolos jika user pilih 'all' ATAU string vibe-nya persis sama
            $cocokVibe = ($vibeClean === 'all' || $tripVibeClean === $vibeClean);
            
            // Cek Pencarian
            $cocokSearch = true;
            if ($searchClean !== '') {
                $namaClean = strtolower(trim($trip['nama']));
                $descClean = strtolower(trim($trip['deskripsi']));
                // Lolos jika kata kunci ditemukan di nama destinasi ATAU di deskripsinya
                $cocokSearch = (strpos($namaClean, $searchClean) !== false || strpos($descClean, $searchClean) !== false);
            }

            // Jika lolos seleksi vibe DAN lolos seleksi pencarian, masukkan ke daftar tampil
            if ($cocokVibe && $cocokSearch) {
                $hasilFilter[] = $trip;
            }
        }

        return $hasilFilter;
    }

    public function getTentangKami() {
        return [
            'deskripsi' => 'Di setiap perjalanan, selalu ada cerita yang menunggu untuk ditemukan. ZGentara Trip hadir untuk membawamu menjelajahi keindahan alam Bondowoso melalui pengalaman yang hangat, bermakna, dan tak sekadar singgah dalam ingatan.',
            'tim' => [
                ['nama' => 'ALFARO', 'role' => 'Mountain Guide', 'foto' => 'foto1.png', 'wisata' => ['Kawah Ijen', 'Blue Fire Ijen'], 'whatsapp' => '6287781896510'],
                ['nama' => 'IHSAN', 'role' => 'Adventure Guide', 'foto' => 'foto2.png', 'wisata' => ['Gunung Raung', 'Gunung Piramida'], 'whatsapp' => '6285854655200'],
                ['nama' => 'MAHSUM', 'role' => 'Nature Explorer', 'foto' => 'foto3.png', 'wisata' => ['Gunung Rante', 'Kawah Wurung'], 'whatsapp' => '6282237774608'],
                ['nama' => 'DARA', 'role' => 'Trip Navigator', 'foto' => 'foto4.png', 'wisata' => ['Bukit Teletubbies', 'Niagara Mini'], 'whatsapp' => '6285707035170'],
                ['nama' => 'REGITA', 'role' => 'Camping Specialist', 'foto' => 'foto5.png', 'wisata' => ['Air Terjun Tancak Kembar', 'Bukit Megasari'], 'whatsapp' => '6285731348852']
            ]
        ];
    }

    public function getTestimoni() {
        return [
            ['nama' => 'Risa F.', 'ulasan' => 'Trip ke Kawah Wurung bareng Gentara bener-bener sehangat itu! Suasana dan seduhan kopinya juara.'],
            ['nama' => 'Bima A.', 'ulasan' => 'Guide ke Piramida sangat profesional. Safety nomor satu, dan hasil dokumentasinya estetik abis.']
        ];
    }
}

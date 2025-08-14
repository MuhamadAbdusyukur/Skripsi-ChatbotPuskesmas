<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Models\Pengunjung;
use App\Models\Poli;
use Illuminate\Support\Str;

class PendaftaranPasienConversation extends Conversation
{
    protected $nik;
    protected $nama;
    protected $telepon;
    protected $alamat;
    protected $tglKunjung;
    protected $poliId;

    public function askNik()
    {
        $this->ask('Masukkan NIK Anda (16 digit):', function ($answer) {
            $nik = preg_replace('/\D/', '', $answer->getText());
            if (strlen($nik) !== 16) {
                $this->say('❌ NIK harus 16 digit.');
                return $this->repeat();
            }
            $this->nik = e($nik); // Sanitasi input
            $this->askNama();
        });
    }

    public function askNama()
    {
        $this->ask('Masukkan nama lengkap Anda:', function ($answer) {
            $nama = trim($answer->getText());
            if (strlen($nama) < 3) {
                $this->say('❌ Nama terlalu pendek.');
                return $this->repeat();
            }
            $this->nama = e($nama);
            $this->askTelepon();
        });
    }

    public function askTelepon()
    {
        $this->ask('Masukkan nomor telepon Anda:', function ($answer) {
            $telepon = preg_replace('/\D/', '', $answer->getText());
            if (strlen($telepon) < 10) {
                $this->say('❌ Nomor telepon tidak valid.');
                return $this->repeat();
            }
            $this->telepon = e($telepon);
            $this->askAlamat();
        });
    }

    public function askAlamat()
    {
        $this->ask('Masukkan alamat Anda:', function ($answer) {
            $alamat = trim($answer->getText());
            if (strlen($alamat) < 5) {
                $this->say('❌ Alamat terlalu pendek.');
                return $this->repeat();
            }
            $this->alamat = e($alamat);
            $this->askTanggalKunjung();
        });
    }

    public function askTanggalKunjung()
    {
        $this->ask('Masukkan tanggal kunjungan (YYYY-MM-DD):', function ($answer) {
            $tgl = trim($answer->getText());
            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $tgl)) {
                $this->say('❌ Format tanggal salah. Gunakan YYYY-MM-DD.');
                return $this->repeat();
            }
            $this->tglKunjung = e($tgl);
            $this->askPoli();
        });
    }

    public function askPoli()
    {
        $polis = Poli::all();
        if ($polis->isEmpty()) {
            $this->say('❌ Tidak ada data poli tersedia.');
            return;
        }

        $options = "";
        foreach ($polis as $poli) {
            $options .= "{$poli->id}. {$poli->nama}\n";
        }

        $this->ask("Pilih poli tujuan dengan mengetikkan nomor:\n" . $options, function ($answer) use ($polis) {
            $id = (int) $answer->getText();
            if (!$polis->contains('id', $id)) {
                $this->say('❌ Pilihan poli tidak valid.');
                return $this->repeat();
            }
            $this->poliId = $id;
            $this->simpanPendaftaran();
        });
    }

    public function simpanPendaftaran()
    {
        Pengunjung::create([
            'nik' => $this->nik,
            'nama' => $this->nama,
            'telepon' => $this->telepon,
            'alamat' => $this->alamat,
            'tgl_kunjung' => $this->tglKunjung,
            'poli_id' => $this->poliId,
        ]);

        $this->say("✅ Pendaftaran berhasil!  
Terima kasih, {$this->nama}.  
Tanggal kunjungan: {$this->tglKunjung}");
    }

    public function run()
    {
        $this->askNik();
    }
}

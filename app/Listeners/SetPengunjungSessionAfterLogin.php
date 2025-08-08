<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\Pengunjung;
use Carbon\Carbon;

class SetPengunjungSessionAfterLogin
{
    public function handle(Login $event)
    {
        $user = $event->user;

        if ($user->role === 'pengunjung') {
            $pengunjung = Pengunjung::where('nik', $user->nik)
                ->where('selesai', false)
                ->whereDate('tgl_kunjung', today())
                ->latest()
                ->first();

            if ($pengunjung) {
                session([
                    'nomor_antrian' => $pengunjung->nomor_antrian,
                    'pendaftaran_time' => $pengunjung->created_at,
                ]);
            }
        }
    }
}

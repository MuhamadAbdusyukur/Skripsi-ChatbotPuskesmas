<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\DokterController; // Pastikan ini ada
use App\Http\Controllers\LoginPengunjungController;


use BotMan\BotMan\BotMan;
use App\Models\Qna;
use Illuminate\Http\Request; // Tambahkan ini
use App\Http\Controllers\QnaController;
use BotMan\BotMan\Messages\Conversations\Conversation; // Pastikan ini ada
use App\Conversations\TypoConfirmationConversation; // <-- IMPORT INI
use App\Conversations\GeneralQuestionsConversation; // Import conversation baru
use App\Conversations\HealthConsultationConversation; // Tambahkan ini

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie; // Tambahkan ini


use App\Conversations\FallbackConversation; // Jangan lupa use ini
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

use BotMan\BotMan\Messages\Outgoing\OutgoingMessage; // Tambahkan baris ini

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Incoming\Answer;


Route::get('/', [PengunjungController::class, 'index']);

// PENGUNJUNG
// Route::get('/pendaftaran', [PengunjungController::class, 'create'])
//     ->middleware('auth')
//     ->name('pengunjung.create');

// Route::get('/pendaftaran', function () {
//     if (!auth()->check()) {
//         return redirect()->route('pengunjung.login.form')->with('message', 'Silakan login terlebih dahulu.');
//     }

//     if (auth()->user()->role !== 'pengunjung') {
//         abort(403, 'Hanya pengunjung yang dapat mendaftar.');
//     }

//     return app(PengunjungController::class)->create();
// })->name('pengunjung.create');



// Route::middleware(['auth'])->group(function () {
//     Route::get('/pendaftaran', [PengunjungController::class, 'create'])->name('pengunjung.create');
//     Route::post('/pendaftaran', [PengunjungController::class, 'store'])->name('pengunjung.store');
// });



Route::get('/pendaftaran', [PengunjungController::class, 'create'])->name('pengunjung.create');
Route::get('/', [PengunjungController::class, 'index'])->name('home');
Route::post('/pendaftaran', [PengunjungController::class, 'store'])->name('pengunjung.store');
Route::get('/about', [PengunjungController::class, 'about']);
Route::get('/service', [PengunjungController::class, 'service']);
Route::get('/dokter', [PengunjungController::class, 'dokter']);
Route::get('/contact', [PengunjungController::class, 'contact'])->name('contact');


// --- Tambahkan rute untuk artikel publik di sini ---
Route::get('/articles/{slug}', [PengunjungController::class, 'showArticle'])->name('articles.show');
Route::get('/berita', [PengunjungController::class, 'berita'])->name('pengunjung.berita'); // Jika Anda memiliki halaman daftar semua berita
// --------------------------------------------------

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// ADMIN
Route::middleware(['auth'])->group(function () {
    // Grup route yang bisa diakses oleh ADMIN dan SUPER_ADMIN
    Route::middleware(['role:admin,super_admin'])->group(function () {
        // -- DASHBOARD UTAMA ADMIN --
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        
        // -- DATA PENDAFTARAN PASIEN (CRUD) --
        Route::get('/admin/datacreate', [AdminController::class, 'datacreate'])->name('data.create');
        Route::post('/admin/datacreate', [AdminController::class, 'datastore'])->name('data.store');
        Route::get('/admin/{id}/edit', [AdminController::class, 'dataedit'])->name('data.edit');
        Route::put('/admin/{id}', [AdminController::class, 'dataupdate'])->name('data.update');
        Route::delete('/admin/{id}', [AdminController::class, 'datadestroy'])->name('data.destroy');

        // -- LAPORAN --
        Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
        Route::get('/admin/laporan/{tgl_kunjung}', [AdminController::class, 'tgldetail'])->name('admin.tgldetail');
        Route::get('/laporan/poli/{id}', [AdminController::class, 'polidetail']); // Perhatikan nama route jika ingin pakai name()

        // -- LAYANAN POLI (CRUD) --
        Route::get('/admin/poli', [AdminController::class, 'poliindex'])->name('poli.index');
        Route::post('/admin/poli', [AdminController::class, 'polistore'])->name('poli.store');
        Route::get('/admin/poli/{id}/edit', [AdminController::class, 'poliedit'])->name('poli.edit');
        Route::put('/admin/poli/{id}', [AdminController::class, 'poliupdate'])->name('poli.update');
        Route::delete('/admin/poli/{id}', [AdminController::class, 'polidelete'])->name('poli.delete');

        Route::prefix('admin')->name('admin.')->group(function () {
        // Rute untuk Kelola Dokter
        Route::resource('dokter', DokterController::class);
        
        // Rute untuk Kelola Artikel
        Route::resource('articles', ArticleController::class);

        // Rute untuk Kelola Galeri
        Route::resource('gallery', GalleryController::class);
    });
    });

    // =========================================================
    // GRUP ROUTE KHUSUS UNTUK SUPER_ADMIN SAJA
    // =========================================================
    Route::middleware(['role:super_admin'])->group(function () {
        // -- MANAJEMEN PENGGUNA (CRUD USER) --
        Route::get('/admin/user', [AdminController::class, 'userindex'])->name('user.index');
        Route::post('/admin/user', [AdminController::class, 'userstore'])->name('user.store');
        Route::get('/admin/user/{id}/edit', [AdminController::class, 'useredit'])->name('user.edit');
        Route::put('/admin/user/{id}', [AdminController::class, 'userupdate'])->name('user.update');
        Route::delete('/admin/user/{id}', [AdminController::class, 'userdelete'])->name('user.delete');
        
        // Tambahkan route khusus super admin lainnya di sini jika ada
        // Contoh: Route::get('/admin/settings', [SuperAdminController::class, 'settings'])->name('superadmin.settings');
    });
});


// LOGIN
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// REGISTER PENGUNJUNG
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// LOGIN PENGUNJUNG
// FORM LOGIN PENGUNJUNG
Route::get('/pengunjung/login', [LoginController::class, 'formPengunjungLogin'])->name('pengunjung.login.form');

// PROSES LOGIN PENGUNJUNG
Route::post('/pengunjung/login', [LoginController::class, 'loginPengunjung'])->name('pengunjung.login');


// LOGOUT PENGUNJUNG
Route::post('/pengunjung/logout', [LoginController::class, 'logoutPengunjung'])->name('pengunjung.logout');

// setelah selesai datang
Route::post('/pengunjung/selesai', [PengunjungController::class, 'selesai'])->name('pengunjung.selesai');

Route::get('/pendaftaran', [PengunjungController::class, 'create'])->name('pengunjung.pendaftaran');

// Route untuk Halaman Galeri
Route::get('/gallery', [PengunjungController::class, 'gallery'])->name('pengunjung.gallery');



// Route Chatbot
// ROUTE UNTUK BOTMAN
// ROUTE UTAMA UNTUK BOTMAN
// ROUTE UTAMA UNTUK BOTMAN
// ROUTE UTAMA UNTUK BOTMAN
Route::match(['get', 'post'], '/botman', function (Request $request) {
    Log::info('--- BotMan Request Received ---');
    $botman = app('botman');
    $messageText = strtolower(trim($request->input('message')));


    // --- Langkah Baru: Ambil user_id dari cookie atau buat yang baru ---
    // $userId = Cookie::get('user_id');
    // if (!$userId) {
    //     $userId = uniqid('user_');
    //     Cookie::queue('user_id', $userId, 1); // Simpan ID di cookie selama 2 jam (120 menit)
    // }

    // Ambil riwayat chat dari session
    // $chatHistory = Session::get("chat_history_{$userId}", []);

    $response = null;


    // Simpan pesan pengguna ke session
    // if ($messageText) {
    //     $chatHistory[] = ['sender' => 'user', 'message' => $messageText];
    // }

    // Asumsi:
// $messageText adalah input teks dari pengguna.
// Question dan Button adalah class yang sudah Anda definisikan.
// response()->json() adalah fungsi untuk mengirim respons.

/**
 * 1️⃣ Tangani keyword awal "tips kesehatan harian"
 * Menampilkan pilihan kategori tips dengan teks tombol yang lebih baik.
 */
if ($messageText === 'tips') {
    $question = Question::create('Apa jenis tips kesehatan yang ingin Anda ketahui hari ini? Silakan pilih salah satu kategori di bawah ini. 👇')
        ->addButtons([
            Button::create('Tips Pencegahan Penyakit')->value('tips_pencegahan'),
            Button::create('Tips Gaya Hidup')->value('tips_gaya_hidup'),
            Button::create('Tips Pola Makan')->value('tips_pola_makan'),
            Button::create('Tips Mental')->value('tips_mental'),
            Button::create('Tips Fitness')->value('tips_fitness'),
            Button::create('Kembali ke Menu Utama')->value('bantuan'),
        ]);

    return response()->json([
        'reply' => [
            'text' => $question->getText(),
            'buttons' => $question->getButtons()
        ]
    ]);
}

/**
 * 2️⃣ Tangani pilihan kategori tips dari pengguna
 * Menggunakan format Markdown untuk membuat daftar agar tampilan rapi.
 */
if (in_array($messageText, ['tips_gaya_hidup', 'tips_pola_makan', 'tips_pencegahan', 'tips_mental', 'tips_fitness'])) {
    $judulTips = '';
    $daftarTips = '';

    if ($messageText === 'tips_gaya_hidup') {
    $judulTips = "📖 <b>Tips Gaya Hidup Sehat</b><br><br>";
    $daftarTips = "
    <ol>
        <li><b>Tidur Cukup:</b> Pastikan tidur 7-8 jam setiap malam.</li>
        <li><b>Olahraga Teratur:</b> Lakukan aktivitas fisik 30 menit per hari.</li>
        <li><b>Kelola Stres:</b> Coba meditasi, berdoa, atau lakukan hobi untuk relaksasi.</li>
        <li><b>Hidrasi:</b> Minum air putih minimal 8 gelas sehari.</li>
        <li><b>Berjemur:</b> Dapatkan sinar matahari pagi minimal 10 menit.</li>
        <li><b>Batasi Gadget:</b> Istirahatkan mata setiap 30 menit dari layar.</li>
        <li><b>Jaga Postur Tubuh:</b> Duduk dan berdiri dengan posisi tegak.</li>
    </ol>
    <br><i>💡 Mau tips pola makan? Ketik <b>tips_pola_makan</b> atau untuk pencegahan penyakit ketik <b>tips_pencegahan</b></i>";
}

elseif ($messageText === 'tips_pola_makan') {
    $judulTips = "🍎 <b>Tips Pola Makan Sehat</b><br><br>";
    $daftarTips = "
    <ol>
        <li><b>Variasi Makanan:</b> Konsumsi buah, sayur, protein, dan karbohidrat seimbang.</li>
        <li><b>Kurangi Gula dan Garam:</b> Batasi makanan manis dan asin.</li>
        <li><b>Sarapan Sehat:</b> Jangan lewatkan sarapan untuk energi seharian.</li>
        <li><b>Porsi Kecil:</b> Makan dengan porsi kecil tapi sering.</li>
        <li><b>Perbanyak Serat:</b> Konsumsi sayur, buah, dan biji-bijian utuh.</li>
        <li><b>Batasi Makanan Olahan:</b> Pilih makanan segar daripada instan.</li>
        <li><b>Minum Air Putih:</b> Hindari minuman bersoda dan kemasan manis.</li>
    </ol>
    <br><i>💡 Untuk pencegahan penyakit, ketik <b>tips_pencegahan</b></i>";
}

elseif ($messageText === 'tips_pencegahan') {
    $judulTips = "🛡️ <b>Tips Pencegahan Penyakit</b><br><br>";
    $daftarTips = "
    <ol>
        <li><b>Cuci Tangan:</b> Selalu cuci tangan pakai sabun.</li>
        <li><b>Vaksinasi:</b> Ikuti jadwal vaksinasi yang dianjurkan.</li>
        <li><b>Jaga Kebersihan Lingkungan:</b> Bersihkan rumah dan hindari genangan air.</li>
        <li><b>Hindari Kontak Langsung:</b> Jaga jarak dari orang yang sakit.</li>
        <li><b>Konsumsi Makanan Bergizi:</b> Tingkatkan imunitas dengan makanan sehat.</li>
        <li><b>Gunakan Masker:</b> Saat berada di tempat ramai atau saat sakit.</li>
        <li><b>Cukup Istirahat:</b> Tubuh pulih lebih cepat saat cukup tidur.</li>
    </ol>
    <br><i>💡 Mau tips kesehatan mental? Ketik <b>tips_mental</b></i>";
}

elseif ($messageText === 'tips_mental') {
    $judulTips = "🧠 <b>Tips Kesehatan Mental</b><br><br>";
    $daftarTips = "
    <ol>
        <li><b>Luangkan Waktu untuk Diri Sendiri:</b> Lakukan hal yang Anda sukai.</li>
        <li><b>Bicara dengan Orang Terpercaya:</b> Jangan pendam masalah sendiri.</li>
        <li><b>Kurangi Overthinking:</b> Fokus pada hal yang bisa Anda kendalikan.</li>
        <li><b>Praktik Bersyukur:</b> Catat 3 hal yang membuat Anda bersyukur setiap hari.</li>
        <li><b>Istirahat dari Media Sosial:</b> Beri jeda agar pikiran lebih tenang.</li>
        <li><b>Olahraga Ringan:</b> Jalan santai atau yoga untuk mengurangi stres.</li>
        <li><b>Atur Pernafasan:</b> Tarik napas dalam-dalam untuk menenangkan diri.</li>
    </ol>
    <br><i>💡 Untuk tips gaya hidup sehat, ketik <b>tips_gaya_hidup</b></i>";
}

elseif ($messageText === 'tips_fitness') {
    $judulTips = "🏃 <b>Tips Olahraga & Kebugaran</b><br><br>";
    $daftarTips = "
    <ol>
        <li><b>Pemanasan:</b> Lakukan 5-10 menit sebelum olahraga.</li>
        <li><b>Kombinasi Latihan:</b> Gabungkan kardio, kekuatan, dan fleksibilitas.</li>
        <li><b>Jangan Terlalu Berat:</b> Tingkatkan intensitas bertahap.</li>
        <li><b>Gunakan Alat yang Tepat:</b> Pastikan sepatu dan peralatan sesuai.</li>
        <li><b>Pendinginan:</b> Regangkan otot setelah berolahraga.</li>
        <li><b>Olahraga Bersama:</b> Lebih menyenangkan dengan teman.</li>
        <li><b>Istirahat Cukup:</b> Jangan olahraga berlebihan tanpa recovery.</li>
    </ol>
    <br><i>💡 Mau tips pola makan sehat? Ketik <b>tips_pola_makan</b></i>";
}


    $question = Question::create($judulTips . "\n\n" . $daftarTips . "\n\nSemoga bermanfaat! Ada lagi yang bisa saya bantu?")
        ->addButtons([
            Button::create('Pilih Tips Lain')->value('tips'),
            Button::create('Kembali ke Menu Utama')->value('bantuan'),
        ]);

    return response()->json([
        'reply' => [
            'text' => $question->getText(),
            'buttons' => $question->getButtons()
        ]
    ]);
}


    

    if (in_array($messageText, ['mulai', 'halo', 'hallo', 'hi', 'bantuan'])) {
        $conversationInstance = new GeneralQuestionsConversation();
        $questionObject = $conversationInstance->askGeneralQuestions(true);
        
        $response = [
            'text' => $questionObject->getText(),
            'buttons' => $questionObject->getButtons()
        ];
        
        $botman->startConversation($conversationInstance);
    }
    
    elseif ($messageText === 'kirim_link_staff') {
        $response = 'Silakan hubungi staf kami melalui WhatsApp: https://wa.me/6281320296731';
    }

    // --- TAMBAHKAN HANDLER INI ---
    // elseif ($messageText === 'konsultasi') {
    //     $botman->startConversation(new HealthConsultationConversation());
    //     $response = 'Oke, mari kita mulai konsultasi. Apa keluhan utama yang Anda rasakan hari ini?';
    // }
    // --- AKHIR HANDLER BARU ---

    else {
        $foundQnaEntry = null;
        $isTypoCorrection = false;
        
        $responseQna = Qna::where('keyword', 'LIKE', '%' . $messageText . '%')->first();

        if ($responseQna) {
            $foundQnaEntry = $responseQna;
        }

        if ($foundQnaEntry && !$isTypoCorrection) {
            $response = $foundQnaEntry->reply;
        } elseif ($foundQnaEntry && $isTypoCorrection) {
            $botman->startConversation(new TypoConfirmationConversation($foundQnaEntry->keyword, $foundQnaEntry->reply));
            $response = "Apakah yang Anda maksud adalah '" . $foundQnaEntry->keyword . "'? (Ketik 'Ya' atau 'Tidak')";
        } else {
            $question = Question::create('Maaf, saya tidak mengerti. Mungkin Anda bisa mencoba beberapa opsi di bawah ini:')
                ->addButtons([
                    Button::create('Bantuan')->value('mulai'),
                    Button::create('Hubungi Staf')->url('https://wa.me/6281320296731?text=Halo%20Admin.')->additionalParameters(['target' => '_blank']),
                ]);
            
            $response = [
                'text' => $question->getText(),
                'buttons' => $question->getButtons()
            ];
        }

        // Simpan respons bot ke session
    // if ($response) {
    //     $chatHistory[] = ['sender' => 'bot', 'message' => $response];
    // }
    // Session::put("chat_history_{$userId}", $chatHistory);

    }
    
    return response()->json(['reply' => $response]);

})->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);



// --- Tambahkan rute baru untuk mendapatkan histori chat ---
Route::get('/chatbot/history', function (Request $request) {
    $userId = Cookie::get('user_id');
    if (!$userId) {
        return [];
    }
    return Session::get("chat_history_{$userId}", []);
});





// Route Controller QNA
Route::resource('/qna', QnaController::class)->middleware('auth');





// baruuuu chatbot interaktif
// Route untuk menampilkan halaman chat interface pengguna
Route::get('/chatbot', [QnaController::class, 'showChatInterface'])->name('chatbot.show_interface');

// Route API untuk interaksi chatbot (menerima pesan, mengirim balasan & tombol)
Route::post('/chatbot-api', [QnaController::class, 'handleUserChat'])->name('chatbot.interact');

// Route API untuk mendapatkan tombol awal saat halaman dimuat
Route::get('/chatbot-initial-options', [QnaController::class, 'getInitialChatOptions'])->name('chatbot.initial_options');


// Route PDF LAPORAN BERDASARKAN TANGGAL
Route::get('/admin/laporan/pdf/tanggal/{tanggal}', [AdminController::class, 'downloadPdfTanggal'])->name('admin.laporan.pdf_tanggal');
// Route PDF LAPORAN BERDASARKAN POLI
Route::get('/admin/laporan/pdf/poli/{id}', [AdminController::class, 'downloadPdfPoli'])->name('admin.laporan.pdf_poli');



Route::get('/storage/{folder}/{filename}', function ($folder, $filename) {
    $path = "public/{$folder}/{$filename}";

    if (!Storage::exists($path)) {
        abort(404);
    }

    // Ambil file dari storage
    $file = Storage::get($path);

    // Tentukan tipe MIME (misalnya image/png, image/jpeg, dll.)
    $mimeType = Storage::mimeType($path);

    return Response::make($file, 200, [
        'Content-Type' => $mimeType,
        'Content-Disposition' => 'inline; filename="' . $filename . '"'
    ]);
});
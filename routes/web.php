<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\LoginPengunjungController;
use App\Http\Controllers\QnaController;

use BotMan\BotMan\BotMan;
use App\Models\Qna;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Conversations\TypoConfirmationConversation;
use App\Conversations\GeneralQuestionsConversation;
use App\Conversations\FallbackConversation;
use Illuminate\Support\Facades\Log;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Incoming\Answer;


// PENGUNJUNG - Route untuk halaman publik
// Menggunakan satu definisi route untuk setiap path
Route::get('/', [PengunjungController::class, 'index'])->name('home');
Route::get('/about', [PengunjungController::class, 'about'])->name('about');
Route::get('/service', [PengunjungController::class, 'service'])->name('service');
Route::get('/dokter', [PengunjungController::class, 'dokter'])->name('dokter');
Route::get('/contact', [PengunjungController::class, 'contact'])->name('contact');
Route::get('/berita', [PengunjungController::class, 'berita'])->name('pengunjung.berita');
Route::get('/gallery', [PengunjungController::class, 'gallery'])->name('pengunjung.gallery');
Route::get('/articles/{slug}', [PengunjungController::class, 'showArticle'])->name('articles.show');

// PENDAFTARAN - Dapat diakses tanpa login
Route::get('/pendaftaran', [PengunjungController::class, 'create'])->name('pengunjung.create');
Route::post('/pendaftaran', [PengunjungController::class, 'store'])->name('pengunjung.store');
Route::post('/pengunjung/selesai', [PengunjungController::class, 'selesai'])->name('pengunjung.selesai');
Route::get('/pendaftaran', [PengunjungController::class, 'selesai'])->name('pengunjung.pendaftaran');

// AUTHENTIKASI PENGUNJUNG
Route::get('/pengunjung/login', [LoginController::class, 'formPengunjungLogin'])->name('pengunjung.login.form');
Route::post('/pengunjung/login', [LoginController::class, 'loginPengunjung'])->name('pengunjung.login');
Route::post('/pengunjung/logout', [LoginController::class, 'logoutPengunjung'])->name('pengunjung.logout');

// AUTHENTIKASI ADMIN
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register');


// ADMIN - Rute yang dilindungi
Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin,super_admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        
        Route::get('/admin/datacreate', [AdminController::class, 'datacreate'])->name('data.create');
        Route::post('/admin/datacreate', [AdminController::class, 'datastore'])->name('data.store');
        Route::get('/admin/{id}/edit', [AdminController::class, 'dataedit'])->name('data.edit');
        Route::put('/admin/{id}', [AdminController::class, 'dataupdate'])->name('data.update');
        Route::delete('/admin/{id}', [AdminController::class, 'datadestroy'])->name('data.destroy');

        Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
        Route::get('/admin/laporan/{tgl_kunjung}', [AdminController::class, 'tgldetail'])->name('admin.tgldetail');
        Route::get('/laporan/poli/{id}', [AdminController::class, 'polidetail']);

        Route::get('/admin/poli', [AdminController::class, 'poliindex'])->name('poli.index');
        Route::post('/admin/poli', [AdminController::class, 'polistore'])->name('poli.store');
        Route::get('/admin/poli/{id}/edit', [AdminController::class, 'poliedit'])->name('poli.edit');
        Route::put('/admin/poli/{id}', [AdminController::class, 'poliupdate'])->name('poli.update');
        Route::delete('/admin/poli/{id}', [AdminController::class, 'polidelete'])->name('poli.delete');

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::resource('dokter', DokterController::class);
            Route::resource('articles', ArticleController::class);
            Route::resource('gallery', GalleryController::class);
            Route::resource('qna', QnaController::class);
        });
    });

    Route::middleware(['role:super_admin'])->group(function () {
        Route::get('/admin/user', [AdminController::class, 'userindex'])->name('user.index');
        Route::post('/admin/user', [AdminController::class, 'userstore'])->name('user.store');
        Route::get('/admin/user/{id}/edit', [AdminController::class, 'useredit'])->name('user.edit');
        Route::put('/admin/user/{id}', [AdminController::class, 'userupdate'])->name('user.update');
        Route::delete('/admin/user/{id}', [AdminController::class, 'userdelete'])->name('user.delete');
    });
});


Route::get('/admin/laporan/pdf/tanggal/{tanggal}', [AdminController::class, 'downloadPdfTanggal'])->name('admin.laporan.pdf_tanggal');
Route::get('/admin/laporan/pdf/poli/{id}', [AdminController::class, 'downloadPdfPoli'])->name('admin.laporan.pdf_poli');


// ROUTE UTAMA UNTUK BOTMAN
Route::match(['get', 'post'], '/botman', function (Request $request) {
    Log::info('--- BotMan Request Received ---');
    $botman = app('botman');
    $messageText = strtolower(trim($request->input('message')));

    $response = null;

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
    }
    
    return response()->json(['reply' => $response]);

})->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);



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
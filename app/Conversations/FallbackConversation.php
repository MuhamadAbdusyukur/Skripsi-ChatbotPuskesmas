<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Support\Facades\Log; // Jangan lupa ini

// Pastikan Anda juga memiliki GeneralQuestionsConversation.php
use App\Conversations\GeneralQuestionsConversation;

class FallbackConversation extends Conversation
{
    public function run()
    {
        $this->askFallbackOptions();
    }

    public function askFallbackOptions()
    {
        $question = Question::create("Maaf, saya belum mengerti pertanyaan Anda. 😔")
            ->addButtons([
                Button::create('Lihat Topik Bantuan')->value('bantuan'),
                Button::create('Ulangi Pertanyaan')->value('ulangi_pertanyaan'),
                Button::create('Hubungi Kami')->value('hubungi_kami'),
            ]);

        $this->ask($question, function (Answer $answer) {
            Log::info('BotMan: Nilai tombol yang diterima di ask callback dari FallbackConversation: ' . $answer->getValue());

            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'bantuan') {
                    Log::info('BotMan: Memulai GeneralQuestionsConversation dari fallback.');
                    $this->bot->startConversation(new GeneralQuestionsConversation());
                } elseif ($answer->getValue() === 'ulangi_pertanyaan') {
                    Log::info('BotMan: Memulai anonymous conversation untuk ulangi pertanyaan dari fallback.');
                    $this->say('Silakan ketik pertanyaan Anda lagi dengan lebih jelas ya.');
                } elseif ($answer->getValue() === 'hubungi_kami') {
                    Log::info('BotMan: Memulai anonymous conversation untuk informasi kontak.');
                    $this->say('Anda bisa menghubungi kami di nomor telepon (0262) 123456 atau kunjungan halaman <a href="'.route('contact').'" target="_blank">Kontak Kami</a>. 📞');
                } else {
                    Log::info('BotMan: Pilihan tombol tidak dikenal di fallback: ' . $answer->getValue());
                    $this->say('Maaf, saya tidak mengerti pilihan Anda.');
                }
            } else {
                Log::info('BotMan: Pesan bukan interaktif di fallback ask callback, membalas default.');
                $this->say('Maaf, saya tidak mengerti. Silakan gunakan tombol pilihan.');
            }
            // Tidak perlu 'return' di sini karena BotMan mengelola alur Conversation
        });
    }
}
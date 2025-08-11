<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Models\Qna;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; // Tambahkan ini

class GeneralQuestionsConversation extends Conversation
{
    public function start()
    {
        $this->askGeneralQuestions();
    }

    public function run()
    {
        $this->start();
    }

    public function askGeneralQuestions($returnQuestion = false)
    {
        $popularKeywords = Qna::where('is_popular', true)->limit(3)->pluck('keyword')->toArray();

        if (empty($popularKeywords)) {
            $question = Question::create("Halo! Ada yang bisa saya bantu? Silakan ketik pertanyaan Anda.");
            if ($returnQuestion) {
                return $question;
            }
            $this->say($question->getText());
            return;
        }

        $questionMessage = "Halo! Saya bot Puskesmas. BBerikut beberapa pertanyaan yang sering ditanyakan. Silakan pilih salah satu di bawah atau ketik pertanyaan yang ingin kakak tanyakan:";
        $buttons = [];

        foreach ($popularKeywords as $keyword) {
            $buttons[] = Button::create($keyword)->value($keyword);
        }

        $question = Question::create($questionMessage)
            ->addButtons($buttons);

        if ($returnQuestion) {
            return $question;
        }

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $selectedKeyword = strtolower($answer->getValue()); // Tangkap nilai tombol, ubah ke huruf kecil

                // --- PERBAIKAN DI SINI ---
                // Cari jawaban di database berdasarkan keyword dari tombol
                $qnaEntry = Qna::whereRaw('LOWER(keyword) = ?', [$selectedKeyword])->first();

                if ($qnaEntry) {
                    $reply = str_replace(['<p>', '</p>'], '', $qnaEntry->reply);
                    $this->say($reply);
                    $this->say("Ada hal lain yang bisa saya bantu?");
                } else {
                    $this->say("Maaf, terjadi kesalahan. Tidak dapat menemukan jawaban untuk '" . $selectedKeyword . "'.");
                }
            } else {
                $this->say("Mohon pilih dari tombol yang tersedia atau ketik pertanyaan Anda.");
            }
        });
    }
}

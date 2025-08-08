<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Models\Qna; // Pastikan model Qna di-import

class TypoConfirmationConversation extends Conversation
{
    protected $correctedKeyword;
    protected $qnaReply;

    public function __construct($correctedKeyword, $qnaReply)
    {
        $this->correctedKeyword = $correctedKeyword;
        $this->qnaReply = $qnaReply;
    }

    public function run()
    {
        $this->askConfirmation();
    }

    public function askConfirmation()
    {
        $question = Question::create("Apakah yang Anda maksud adalah '" . $this->correctedKeyword . "'?")
            ->addButtons([
                Button::create('Ya')->value('yes'),
                Button::create('Tidak')->value('no'),
            ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'yes') {
                    $this->say($this->qnaReply);
                    $this->say("Ada hal lain yang bisa saya bantu?"); // Opsional: pesan lanjutan
                } else {
                    $this->say("Baik, mohon ketik ulang pertanyaan Anda dengan lebih jelas atau tanpa typo.");
                }
            } else {
                // Pengguna mengetik sesuatu selain tombol
                $this->say("Mohon pilih 'Ya' atau 'Tidak' dari tombol yang tersedia.");
                $this->repeat(); // Minta pengguna untuk memilih lagi
            }
        });
    }
}
@extends('layouts.main') {{-- Menggunakan layout utama Anda --}}

@section('post')

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Chatbot Puskesmas</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Chatbot</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12"> {{-- Kolom utama untuk jendela chat --}}
                <div class="bg-light rounded p-4 shadow-sm">
                    <h5 class="mb-4 text-center">Tanyakan Apa Saja Kepada Kami! 👋</h5>
                    <hr>

                    {{-- Area Pesan Chatbot --}}
                    <div id="chat-messages" style="height: 400px; overflow-y: auto; padding: 15px; border: 1px solid #ddd; border-radius: 8px; background-color: #fff;">
                        {{-- Pesan chat akan dimuat di sini oleh JavaScript --}}
                        <div class="message-bubble bot-message text-start">
                            <p>Halo! Saya Chatbot Puskesmas Banjarwangi. Ada yang bisa saya bantu?</p>
                        </div>
                    </div>

                    <hr class="my-3">

                    {{-- Form Input Pesan --}}
                    <div class="input-group">
                        <input type="text" id="user-input" class="form-control" placeholder="Ketik pesan Anda di sini...">
                        <button class="btn btn-primary" id="send-button">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Fungsi untuk meng-unescape HTML entities
    function decodeHtmlEntities(text) {
        var textArea = document.createElement('textarea');
        textArea.innerHTML = text; // Menggunakan innerHTML untuk memproses entitas
        return textArea.value;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const chatMessages = document.getElementById('chat-messages');
        const userInput = document.getElementById('user-input');
        const sendButton = document.getElementById('send-button');

        // Fungsi untuk menggulir chat ke paling bawah
        function scrollChatToBottom() {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Fungsi untuk menampilkan pesan di jendela chat
        function displayMessage(text, isBot) {
            const messageBubble = document.createElement('div');
            messageBubble.classList.add('message-bubble');

            const messageTextContent = document.createElement('div');
            messageTextContent.classList.add('message-text-content');

            // --- KUNCI: Merender HTML dari balasan ---
            messageTextContent.innerHTML = decodeHtmlEntities(text); // Menggunakan innerHTML setelah decode
            // ----------------------------------------

            messageBubble.appendChild(messageTextContent);

            if (isBot) {
                messageBubble.classList.add('bot-message');
            } else {
                messageBubble.classList.add('user-message');
            }

            chatMessages.appendChild(messageBubble);
            scrollChatToBottom();
        }

        // Fungsi untuk mengirim pesan ke BotMan backend
        async function sendMessage() {
            const message = userInput.value.trim();
            if (message === '') return;

            displayMessage(message, false); // Tampilkan pesan pengguna
            userInput.value = ''; // Kosongkan input

            try {
                const response = await fetch('/botman', { // Mengirim pesan ke endpoint BotMan
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Pastikan ada meta tag CSRF
                    },
                    body: JSON.stringify({
                        driver: 'web', // Atau driver yang sesuai
                        userId: '123', // ID pengguna (bisa dinamis)
                        message: message
                    })
                });

                const data = await response.json();
                console.log('BotMan Response:', data); // Log respons dari BotMan

                // Tangani balasan dari BotMan
                if (data && data.messages && data.messages.length > 0) {
                    data.messages.forEach(msg => {
                        // Periksa jika pesan memiliki attachment (untuk tombol)
                        if (msg.type === 'card' && msg.attachment && msg.attachment.type === 'default' && msg.attachment.payload && msg.attachment.payload.buttons) {
                            // Ini adalah respons dengan tombol
                            displayMessage(msg.text, true); // Tampilkan teks pertanyaan
                            // Tampilkan tombol
                            const buttonContainer = document.createElement('div');
                            buttonContainer.classList.add('button-container');
                            msg.attachment.payload.buttons.forEach(button => {
                                const btn = document.createElement('button');
                                btn.classList.add('btn', 'btn-outline-primary', 'btn-sm', 'm-1'); // Gaya tombol
                                btn.textContent = button.text;
                                btn.setAttribute('data-value', button.value); // Simpan payload di data-value
                                btn.addEventListener('click', function() {
                                    displayMessage(button.text, false); // Tampilkan pilihan pengguna
                                    // Kirim payload tombol ke BotMan
                                    sendButtonPayload(button.value);
                                });
                                buttonContainer.appendChild(btn);
                            });
                            chatMessages.appendChild(buttonContainer);
                            scrollChatToBottom();
                        } else {
                            displayMessage(msg.text, true); // Tampilkan balasan teks bot
                        }
                    });
                } else {
                    displayMessage("Maaf, saya tidak bisa memproses permintaan Anda saat ini.", true);
                }

            } catch (error) {
                console.error('Error sending message to BotMan:', error);
                displayMessage("Terjadi kesalahan. Silakan coba lagi nanti.", true);
            }
        }

        // Fungsi untuk mengirim payload tombol ke BotMan
        async function sendButtonPayload(payload) {
            try {
                const response = await fetch('/botman', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        driver: 'web',
                        userId: '123', // ID pengguna
                        message: payload // Kirim payload sebagai pesan
                    })
                });
                const data = await response.json();
                console.log('BotMan Button Response:', data);
                if (data && data.messages && data.messages.length > 0) {
                    data.messages.forEach(msg => {
                        if (msg.type === 'card' && msg.attachment && msg.attachment.type === 'default' && msg.attachment.payload && msg.attachment.payload.buttons) {
                            displayMessage(msg.text, true);
                            const buttonContainer = document.createElement('div');
                            buttonContainer.classList.add('button-container');
                            msg.attachment.payload.buttons.forEach(button => {
                                const btn = document.createElement('button');
                                btn.classList.add('btn', 'btn-outline-primary', 'btn-sm', 'm-1');
                                btn.textContent = button.text;
                                btn.setAttribute('data-value', button.value);
                                btn.addEventListener('click', function() {
                                    displayMessage(button.text, false);
                                    sendButtonPayload(button.value);
                                });
                                buttonContainer.appendChild(btn);
                            });
                            chatMessages.appendChild(buttonContainer);
                        } else {
                            displayMessage(msg.text, true);
                        }
                    });
                }
                scrollChatToBottom();
            } catch (error) {
                console.error('Error sending button payload to BotMan:', error);
                displayMessage("Terjadi kesalahan. Silakan coba lagi nanti.", true);
            }
        }

        // Event Listeners
        sendButton.addEventListener('click', sendMessage);

        userInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
        
        // --- Inisialisasi Pesan Awal (opsional) ---
        // Panggil pesan pembuka jika Anda ingin bot memulai percakapan
        // Kirim payload 'mulai' agar botman mengenali sebagai pesan awal
        // Ini menggantikan introMessage statis di widget lama
        // sendMessage(); // Mungkin perlu dipanggil otomatis atau biarkan user ketik 'mulai'
        
        // === Pastikan Anda punya CSRF token di <head> layout ===
        // <meta name="csrf-token" content="{{ csrf_token() }}">
    });
</script>
@endpush
<!-- Chatbot Widget -->
<div id="chatbot-widget" class="fixed bottom-6 right-6 z-50">
    <!-- Toggle Button -->
    <div id="chatbot-toggle"
         class="w-16 h-16 bg-gradient-to-br from-blue-600 to-purple-700 rounded-full flex items-center justify-center text-white text-2xl cursor-pointer shadow-2xl hover:shadow-3xl transition-all duration-300 hover:scale-105 group border border-blue-500">
        <span class="group-hover:rotate-12 transition-transform duration-300">💬</span>
        <div class="absolute -top-1 -right-1 w-4 h-4 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full animate-pulse border border-white"></div>
    </div>

    <!-- Chat Container -->
    <div id="chatbot-container"
         class="absolute bottom-24 right-0 w-96 h-[600px] bg-gray-900 rounded-2xl shadow-2xl hidden flex-col border border-gray-700 transform transition-all duration-300 scale-95 origin-bottom-right backdrop-blur-sm">

        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-700 text-white p-5 rounded-t-2xl flex justify-between items-center border-b border-blue-500">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-white to-gray-200 rounded-full flex items-center justify-center shadow-lg">
                    <span class="text-xl text-blue-600">🚗</span>
                </div>
                <div>
                    <h3 class="font-bold text-lg tracking-tight">Rental Assistant</h3>
                    <p class="text-blue-100 text-xs flex items-center font-medium">
                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                        Professional Service • Online
                    </p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <button id="chatbot-clear" class="text-blue-100 hover:text-white text-lg transition-all duration-200 hover:scale-110" title="Clear Chat">
                    🔄
                </button>
                <button id="chatbot-close" class="text-blue-100 hover:text-white text-2xl font-bold transition-all duration-200 hover:scale-110">×</button>
            </div>
        </div>

        <!-- Messages Area -->
        <div id="chatbot-messages" class="flex-1 p-5 overflow-y-auto bg-gradient-to-br from-gray-800 to-gray-900 space-y-4">
            <div class="flex justify-start">
                <div class="bg-gray-800 rounded-2xl rounded-tl-none px-5 py-4 max-w-[90%] shadow-lg border border-gray-700">
                    <div class="flex items-center space-x-2 mb-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                            R
                        </div>
                        <span class="text-sm font-semibold text-white">Rental Assistant</span>
                    </div>
                    <p class="text-gray-200 text-sm leading-relaxed">Halo! Selamat datang di Rental Mobil Professional! 🚗 Ada yang bisa saya bantu?</p>
                    <ul class="text-sm text-gray-300 mt-3 space-y-2">
                        <li class="flex items-center space-x-2">
                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                            <span>🚗 Mobil tersedia & harga</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                            <span>📋 Syarat & ketentuan</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                            <span>📍 Lokasi & kontak</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                            <span>📞 Cara booking</span>
                        </li>
                    </ul>
                    <span class="text-xs text-gray-400 mt-3 block" id="current-time"></span>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-5 border-t border-gray-700 bg-gray-800 rounded-b-2xl">
            <div class="flex space-x-3">
                <input type="text"
                       id="chatbot-text"
                       placeholder="Tanya tentang rental mobil..."
                       class="flex-1 px-5 py-4 border border-gray-600 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm shadow-sm bg-gray-700 text-white placeholder-gray-400 transition-all duration-200">
                <button id="chatbot-send"
                        class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-4 rounded-2xl hover:from-blue-600 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 text-sm font-semibold flex items-center space-x-2">
                    <span>Kirim</span>
                    <span class="text-lg">↑</span>
                </button>
            </div>
            <p class="text-xs text-gray-400 text-center mt-3 font-medium">Professional Service • Ketik 'clear' untuk reset chat</p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set current time
    document.getElementById('current-time').textContent = new Date().toLocaleTimeString('id-ID', {
        hour: '2-digit',
        minute: '2-digit'
    });

    const chatbotToggle = document.getElementById('chatbot-toggle');
    const chatbotContainer = document.getElementById('chatbot-container');
    const chatbotClose = document.getElementById('chatbot-close');
    const chatbotClear = document.getElementById('chatbot-clear');
    const chatbotSend = document.getElementById('chatbot-send');
    const chatbotText = document.getElementById('chatbot-text');
    const chatbotMessages = document.getElementById('chatbot-messages');

    // Load chat history from localStorage
    loadChatHistory();

    // Toggle chatbot dengan animasi
    chatbotToggle.addEventListener('click', () => {
        const isHidden = chatbotContainer.classList.contains('hidden');

        if (isHidden) {
            chatbotContainer.classList.remove('hidden');
            chatbotContainer.classList.add('flex');
            setTimeout(() => {
                chatbotContainer.classList.remove('scale-95');
                chatbotContainer.classList.add('scale-100');
            }, 10);
            chatbotText.focus();
        } else {
            chatbotContainer.classList.remove('scale-100');
            chatbotContainer.classList.add('scale-95');
            setTimeout(() => {
                chatbotContainer.classList.add('hidden');
                chatbotContainer.classList.remove('flex');
            }, 300);
        }
    });

    // Close chatbot
    chatbotClose.addEventListener('click', () => {
        chatbotContainer.classList.remove('scale-100');
        chatbotContainer.classList.add('scale-95');
        setTimeout(() => {
            chatbotContainer.classList.add('hidden');
            chatbotContainer.classList.remove('flex');
        }, 300);
    });

    // Clear chat history
    chatbotClear.addEventListener('click', clearChatHistory);

    // Send message
    chatbotSend.addEventListener('click', sendMessage);
    chatbotText.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });

    async function sendMessage() {
        const message = chatbotText.value.trim();
        if (!message) return;

        // Check if user wants to clear chat
        if (message.toLowerCase() === 'clear' || message.toLowerCase() === 'hapus') {
            clearChatHistory();
            chatbotText.value = '';
            return;
        }

        // Add user message
        addMessage(message, 'user');
        chatbotText.value = '';

        // Show loading
        showLoading();

        try {
            const response = await fetch('/chatbot/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message: message })
            });

            const data = await response.json();

            // Hide loading and add bot response
            hideLoading();
            if (data.success) {
                addMessage(data.bot_response, 'bot', data.timestamp);
            } else {
                addMessage('Maaf, terjadi kesalahan. Silakan coba lagi.', 'bot');
            }

            // Save to localStorage
            saveChatToHistory();

        } catch (error) {
            hideLoading();
            addMessage('Maaf, koneksi terganggu. Silakan coba lagi.', 'bot');
            saveChatToHistory();
        }
    }

    function addMessage(text, sender, timestamp = null) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `flex ${sender === 'user' ? 'justify-end' : 'justify-start'} mb-5 animate-fade-in`;

        const messageBubble = document.createElement('div');
        if (sender === 'user') {
            messageBubble.className = 'bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-2xl rounded-br-none px-5 py-4 max-w-[90%] shadow-xl';
        } else {
            messageBubble.className = 'bg-gray-800 rounded-2xl rounded-tl-none px-5 py-4 max-w-[90%] shadow-lg border border-gray-700';

            // Add bot avatar for bot messages
            const avatarDiv = document.createElement('div');
            avatarDiv.className = 'flex items-center space-x-2 mb-2';
            avatarDiv.innerHTML = `
                <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                    R
                </div>
                <span class="text-xs font-semibold text-white">Rental Assistant</span>
            `;
            messageBubble.appendChild(avatarDiv);
        }

        const messageText = document.createElement('p');
        messageText.className = 'text-sm whitespace-pre-wrap leading-relaxed';
        messageText.textContent = text;

        const timeSpan = document.createElement('span');
        timeSpan.className = sender === 'user' ? 'text-xs text-blue-100 mt-2 block' : 'text-xs text-gray-400 mt-2 block';
        timeSpan.textContent = timestamp || new Date().toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit'
        });

        messageBubble.appendChild(messageText);
        messageBubble.appendChild(timeSpan);
        messageDiv.appendChild(messageBubble);

        chatbotMessages.appendChild(messageDiv);
        scrollToBottom();
    }

    function showLoading() {
        const loadingDiv = document.createElement('div');
        loadingDiv.className = 'flex justify-start mb-5 animate-fade-in';
        loadingDiv.innerHTML = `
            <div class="bg-gray-800 rounded-2xl rounded-tl-none px-5 py-4 shadow-lg border border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                        R
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs font-semibold text-white mb-1">Rental Assistant</span>
                        <div class="flex items-center space-x-2">
                            <div class="flex space-x-1">
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-bounce"></div>
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                            </div>
                            <span class="text-xs text-gray-400">Mengetik...</span>
                        </div>
                    </div>
                </div>
            </div>
        `;
        chatbotMessages.appendChild(loadingDiv);
        scrollToBottom();
    }

    function hideLoading() {
        const loadingElements = chatbotMessages.querySelectorAll('.flex.justify-start');
        const lastLoading = loadingElements[loadingElements.length - 1];
        if (lastLoading && lastLoading.innerHTML.includes('animate-bounce')) {
            lastLoading.remove();
        }
    }

    function clearChatHistory() {
        chatbotMessages.innerHTML = `
            <div class="flex justify-start mb-5 animate-fade-in">
                <div class="bg-gray-800 rounded-2xl rounded-tl-none px-5 py-4 max-w-[90%] shadow-lg border border-gray-700">
                    <div class="flex items-center space-x-2 mb-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                            R
                        </div>
                        <span class="text-sm font-semibold text-white">Rental Assistant</span>
                    </div>
                    <p class="text-gray-200 text-sm">Obrolan telah dihapus! 🧹</p>
                    <p class="text-gray-200 text-sm mt-1">Ada yang bisa saya bantu mengenai layanan rental mobil?</p>
                    <span class="text-xs text-gray-400 mt-2 block">${new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })}</span>
                </div>
            </div>
        `;
        localStorage.removeItem('rental_chatbot_history');
    }

    function saveChatToHistory() {
        const messages = [];
        chatbotMessages.querySelectorAll('.flex').forEach(messageDiv => {
            const messageBubble = messageDiv.querySelector('div');
            const messageText = messageBubble.querySelector('p').textContent;
            const timestamp = messageBubble.querySelector('span').textContent;
            const sender = messageDiv.classList.contains('justify-end') ? 'user' : 'bot';

            messages.push({
                text: messageText,
                sender: sender,
                timestamp: timestamp
            });
        });

        localStorage.setItem('rental_chatbot_history', JSON.stringify(messages));
    }

    function loadChatHistory() {
        const savedChat = localStorage.getItem('rental_chatbot_history');
        if (savedChat) {
            const messages = JSON.parse(savedChat);
            chatbotMessages.innerHTML = '';

            messages.forEach(msg => {
                addMessage(msg.text, msg.sender, msg.timestamp);
            });
        }
    }

    function scrollToBottom() {
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }
});
</script>

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fade-in 0.3s ease-out;
}

#chatbot-messages::-webkit-scrollbar {
    width: 6px;
}

#chatbot-messages::-webkit-scrollbar-track {
    background: #374151;
    border-radius: 3px;
}

#chatbot-messages::-webkit-scrollbar-thumb {
    background: #4B5563;
    border-radius: 3px;
}

#chatbot-messages::-webkit-scrollbar-thumb:hover {
    background: #6B7280;
}

#chatbot-container {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

#chatbot-toggle {
    box-shadow: 0 20px 40px -10px rgba(59, 130, 246, 0.5);
}

.hover\:shadow-3xl:hover {
    box-shadow: 0 25px 50px -12px rgba(59, 130, 246, 0.6);
}
</style>

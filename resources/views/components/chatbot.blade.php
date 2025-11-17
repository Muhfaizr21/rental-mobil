<!-- Chatbot Widget -->
<div id="chatbot-widget" class="fixed bottom-6 right-6 z-50">
    <!-- Toggle Button -->
    <div id="chatbot-toggle"
         class="w-14 h-14 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full flex items-center justify-center text-white text-xl cursor-pointer shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 group">
        <span class="group-hover:scale-110 transition-transform">💬</span>
        <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
    </div>

    <!-- Chat Container -->
    <div id="chatbot-container"
         class="absolute bottom-20 right-0 w-96 h-[500px] bg-white rounded-2xl shadow-2xl hidden flex-col border border-gray-100 transform transition-all duration-300 scale-95 origin-bottom-right">

        <!-- Header -->
        <div class="bg-gradient-to-r from-purple-600 to-blue-600 text-white p-4 rounded-t-2xl flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                    <span class="text-lg">🚗</span>
                </div>
                <div>
                    <h3 class="font-bold text-lg">Rental Assistant</h3>
                    <p class="text-blue-100 text-xs flex items-center">
                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                        Online • AI Powered
                    </p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <button id="chatbot-clear" class="text-white hover:text-blue-200 text-sm transition-colors" title="Hapus Chat">
                    🗑️
                </button>
                <button id="chatbot-close" class="text-white hover:text-blue-200 text-xl font-bold transition-colors">×</button>
            </div>
        </div>

        <!-- Messages Area -->
        <div id="chatbot-messages" class="flex-1 p-4 overflow-y-auto bg-gradient-to-b from-gray-50 to-blue-50 space-y-3">
            <div class="flex justify-start">
                <div class="bg-white rounded-2xl rounded-tl-none px-4 py-3 max-w-[85%] shadow-sm border border-blue-100">
                    <p class="text-gray-800 text-sm">Halo! 👋 Saya asisten rental mobil. Tanyakan tentang:</p>
                    <ul class="text-xs text-gray-600 mt-2 space-y-1">
                        <li>• 🚗 Mobil tersedia</li>
                        <li>• 💰 Harga sewa</li>
                        <li>• 📋 Syarat rental</li>
                        <li>• 📅 Cara booking</li>
                    </ul>
                    <span class="text-xs text-gray-500 mt-2 block">{{ now()->format('H:i') }}</span>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-4 border-t border-gray-200 bg-white rounded-b-2xl">
            <div class="flex space-x-2">
                <input type="text"
                       id="chatbot-text"
                       placeholder="Tanya tentang rental mobil..."
                       class="flex-1 px-4 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm shadow-sm">
                <button id="chatbot-send"
                        class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-5 py-3 rounded-full hover:from-purple-700 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 text-sm font-medium">
                    Kirim
                </button>
            </div>
            <p class="text-xs text-gray-500 text-center mt-2">Powered by Real-time Database • Ketik 'hapus' untuk reset chat</p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
        if (message.toLowerCase() === 'hapus' || message.toLowerCase() === 'clear') {
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
        messageDiv.className = `flex ${sender === 'user' ? 'justify-end' : 'justify-start'} mb-4 animate-fade-in`;

        const messageBubble = document.createElement('div');
        if (sender === 'user') {
            messageBubble.className = 'bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-2xl rounded-br-none px-4 py-3 max-w-[85%] shadow-lg';
        } else {
            messageBubble.className = 'bg-white rounded-2xl rounded-tl-none px-4 py-3 max-w-[85%] shadow-sm border border-blue-100';
        }

        const messageText = document.createElement('p');
        messageText.className = 'text-sm whitespace-pre-wrap leading-relaxed';
        messageText.textContent = text;

        const timeSpan = document.createElement('span');
        timeSpan.className = sender === 'user' ? 'text-xs text-blue-100 mt-2 block' : 'text-xs text-gray-500 mt-2 block';
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
        loadingDiv.className = 'flex justify-start mb-4 animate-fade-in';
        loadingDiv.innerHTML = `
            <div class="bg-white rounded-2xl rounded-tl-none px-4 py-3 shadow-sm border border-blue-100">
                <div class="flex items-center space-x-2">
                    <div class="flex space-x-1">
                        <div class="w-2 h-2 bg-blue-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                        <div class="w-2 h-2 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    </div>
                    <span class="text-xs text-gray-500">AI sedang mengetik...</span>
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
            <div class="flex justify-start mb-4 animate-fade-in">
                <div class="bg-white rounded-2xl rounded-tl-none px-4 py-3 max-w-[85%] shadow-sm border border-blue-100">
                    <p class="text-gray-800 text-sm">Obrolan telah dihapus! 🧹</p>
                    <p class="text-gray-800 text-sm mt-1">Ada yang bisa saya bantu?</p>
                    <span class="text-xs text-gray-500 mt-2 block">${new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })}</span>
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
    background: #f1f5f9;
    border-radius: 3px;
}

#chatbot-messages::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

#chatbot-messages::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

#chatbot-container {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

#chatbot-toggle {
    box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.4);
}
</style>

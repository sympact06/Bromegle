<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bromegle - Chat with Strangers</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-900 text-gray-200 font-sans leading-normal tracking-normal">
<div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-gray-800 rounded-lg overflow-hidden md:max-w-lg">
        <div class="md:flex">
            <div class="w-full">
                <div class="relative p-4 text-center">
                    <span class="text-2xl font-bold">Bromegle Chat</span>
                </div>
                <div class="relative p-4 flex-auto overflow-y-auto h-96">
                    <div class="chat-messages space-y-4 p-3">
                        <!-- Messages will be dynamically added here -->
                    </div>
                </div>
                <div class="p-3 border-t border-gray-700">
                    <div class="relative">
                        <input type="text" id="messageInput" class="w-full bg-gray-900 rounded-full py-2 px-4 leading-tight focus:outline-none focus:shadow-outline text-gray-200 placeholder-gray-500" placeholder="Type your message here..." autofocus>
                        <div class="absolute right-0 top-0 mr-4 mt-3">
                            <button class="text-blue-500 hover:text-blue-400">
                                <svg class="h-6 w-6 fill-current" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Send</title><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const chatMessages = document.querySelector('.chat-messages');
    const messageInput = document.getElementById('messageInput');

    function addMessage(message, isOwnMessage = false) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('text-sm', 'py-2', 'px-4', 'rounded-lg');
        if (isOwnMessage) {
            messageElement.classList.add('bg-blue-500', 'text-white', 'ml-auto');
        } else {
            messageElement.classList.add('bg-gray-700', 'text-gray-300');
        }
        messageElement.textContent = message;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    messageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && this.value.trim() !== '') {
            addMessage(this.value, true); // Simulate sending message
            // TODO: Implement sending message to backend
            this.value = ''; // Clear input
        }
    });

    // TODO: Implement receiving messages and calling addMessage()
</script>
</body>
</html>

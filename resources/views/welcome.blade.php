<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bromegle - Chat with Strangers</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
<div id="app" class="flex flex-col items-center justify-center h-full">
    <div class="w-full max-w-2xl mx-auto bg-white shadow-md rounded-lg">
        <div class="header bg-blue-500 text-white text-lg py-4 px-6 rounded-t-lg">
            Bromegle Chat
        </div>
        <div class="body p-6 overflow-y-scroll h-96" style="height: 400px;" id="chat">
            <!-- Messages will be displayed here -->
        </div>
        <div class="footer bg-gray-200 p-4 rounded-b-lg">
            <input type="text" id="messageInput" class="w-full p-2 rounded-lg" placeholder="Type your message here..." autofocus>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    const chat = document.getElementById('chat');
    const messageInput = document.getElementById('messageInput');

    // Example function to add messages to the chat
    function addMessage(message) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('p-2', 'mt-2', 'bg-blue-100', 'rounded');
        messageElement.textContent = message;
        chat.appendChild(messageElement);
        chat.scrollTop = chat.scrollHeight; // Scroll to the bottom
    }

    // Example sending message (integrate with your backend)
    messageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && this.value.trim() !== '') {
            // Send the message to the backend
            axios.post('/send-message', { message: this.value })
                .then(response => {
                    console.log('Message sent');
                })
                .catch(error => {
                    console.error('Error sending message', error);
                });

            this.value = ''; // Clear input
        }
    });


    Echo.channel('chat')
        .listen('.ChatMessageReceived', (e) => {
            addMessage(e.message);
        });
</script>
</body>
</html>

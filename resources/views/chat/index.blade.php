@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Chat Assistant</h5>
            </div>
            <div class="card-body p-4" id="chatBoxContainer" style="height: 70vh;">
                <!-- Chat Box -->
                <div class="chat-box" id="chat-box" style="max-height: 60vh; overflow-y: auto;">
                    <div class="chat-message bot-message">
                        <p>Hello! How can I assist you today?</p>
                    </div>
                </div>
                <!-- User Input -->
                <div class="input-group mt-4">
                    <input type="text" class="form-control" id="userMessage" placeholder="Type your message..." aria-label="Message" style="font-size: 16px; padding: 12px;">
                    <button class="btn btn-primary" id="sendMessage" type="button" style="font-size: 16px; padding: 12px 20px;">
                        Send
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles -->
<style>
    .chat-box {
        max-height: 450px;
        overflow-y: auto;
        padding: 20px;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .chat-message {
        padding: 12px;
        margin: 5px 0;
        border-radius: 10px;
        background-color: #e9ecef;
    }

    .bot-message {
        background-color: #007bff;
        color: white;
        align-self: flex-start;
    }

    .user-message {
        background-color: #28a745;
        color: white;
        align-self: flex-end;
    }

    .input-group input {
        border-radius: 20px;
        border: 1px solid #ccc;
    }

    .input-group button {
        border-radius: 20px;
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
        .chat-box {
            max-height: 300px;
        }
        .input-group input {
            font-size: 14px;
        }
    }
</style>

<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sendMessageButton = document.getElementById('sendMessage');
        const userMessageInput = document.getElementById('userMessage');
        const chatBox = document.getElementById('chat-box');

        sendMessageButton.addEventListener('click', function () {
            const userMessage = userMessageInput.value.trim();
            if (userMessage !== "") {
                appendMessage(userMessage, 'user');
                userMessageInput.value = ''; // clear input
                // Simulate response from chatbot
                setTimeout(() => {
                    appendMessage("I'm here to help! Ask me about the matches or teams.", 'bot');
                }, 1000);
            }
        });

        // Function to append message to chatbox
        function appendMessage(message, sender) {
            const messageElement = document.createElement('div');
            messageElement.classList.add('chat-message');
            messageElement.classList.add(sender === 'user' ? 'user-message' : 'bot-message');
            messageElement.innerHTML = `<p>${message}</p>`;
            chatBox.appendChild(messageElement);
            chatBox.scrollTop = chatBox.scrollHeight; // Auto-scroll to bottom
        }

        // Allow user to press "Enter" to send message
        userMessageInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                sendMessageButton.click();
            }
        });
    });
</script>

@endsection

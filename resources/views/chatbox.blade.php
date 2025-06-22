@extends('layouts.dashboard')

@section('content')
<!-- ✅ Full-Screen Chatbox Section -->
<div id="fullPageChatbox" style="position:fixed; top:0; left:0; width:calc(100% - 270px); height:100%; background:white; border:0; z-index:9999; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); display: block; opacity: 1; transition: all 0.3s ease-in-out; padding: 20px; margin-left: 270px;">
    <!-- Back Button to return to the previous page -->
    <div style="position: absolute; top: 20px; left: 20px;">
        <button class="btn btn-secondary" onclick="goBack()" style="border-radius: 10px; font-size: 18px; padding: 10px 20px;">← Back</button>
    </div>

    <!-- Title of the Chatbox -->
    <h5 class="mb-4 text-center">💬 QnA</h5>

    <!-- Chat Messages Section -->
    <div id="chatMessages" style="max-height: calc(100% - 160px); overflow-y:auto; border:1px solid #eee; padding:20px; margin-bottom:15px; background-color: #f9f9f9; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        <!-- Chat messages will appear here -->
    </div>

    <!-- Message Input Section -->
    <textarea id="userMessage" class="form-control" rows="3" placeholder="Type your message..." style="border-radius: 10px; margin-bottom: 15px; padding: 15px; font-size: 16px;"></textarea>
    <button class="btn btn-primary w-100" onclick="sendMessage()" style="border-radius: 10px; font-size: 16px; padding: 15px;">Send</button>
</div>

<script>
    // Function to send message to the chatbot
    function sendMessage() {
        const message = document.getElementById('userMessage').value;
        if (!message.trim()) return;

        const messagesDiv = document.getElementById('chatMessages');
        messagesDiv.innerHTML += `<div class="chat-message user-message"><b>You:</b> ${message}</div>`;
        document.getElementById('userMessage').value = '';

        fetch('{{ route("chatbox.send") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ message })
        })
        .then(response => response.json())
        .then(data => {
            messagesDiv.innerHTML += `<div class="chat-message ai-message"><b>AI:</b> ${data.reply}</div>`;
            messagesDiv.scrollTop = messagesDiv.scrollHeight; // Scroll to the latest message
        })
        .catch(error => {
            messagesDiv.innerHTML += `<div class="chat-message error-message"><b>Error:</b> Could not get response.</div>`;
        });
    }

    // Function to go back to the previous page
    function goBack() {
        window.history.back(); // Go back to the previous page
    }
</script>

<style>
    /* Style for the chat messages */
    .chat-message {
        margin-bottom: 15px;
        padding: 12px;
        border-radius: 15px;
        max-width: 80%;
        word-wrap: break-word;
        transition: all 0.3s ease;
        font-size: 16px;
    }

    .user-message {
        background-color: #d1f7c4;
        margin-left: auto;
        text-align: right;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .ai-message {
        background-color: #e0e0e0;
        margin-right: auto;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .error-message {
        background-color: #ffcccb;
        color: #ff0000;
        text-align: center;
        border-radius: 5px;
    }

    /* Smooth fade-in and slide-up effect for the full-page chatbox */
    #fullPageChatbox {
        opacity: 0;
        transform: translateY(20px);
    }
    #fullPageChatbox.show {
        opacity: 1;
        transform: translateY(0);
        transition: all 0.3s ease-in-out;
    }

    /* Back button styling */
    .btn-secondary {
        padding: 10px 20px;
        font-size: 18px;
        border-radius: 10px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        #fullPageChatbox {
            padding: 15px;
        }

        .chat-message {
            font-size: 14px;
            padding: 10px;
        }

        .btn-primary, .btn-secondary {
            font-size: 14px;
            padding: 12px 20px;
        }
    }
</style>
@endsection

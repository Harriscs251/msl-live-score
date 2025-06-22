@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">🤖 Chatbot Assistant</h5>
        </div>
        <div class="card-body">
            <div id="chat-box" style="height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;"></div>
            <form id="chat-form" class="d-flex mt-3">
                <input type="text" id="message" class="form-control me-2" placeholder="Type your message..." required>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('chat-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const messageInput = document.getElementById('message');
    const chatBox = document.getElementById('chat-box');
    const message = messageInput.value;

    chatBox.innerHTML += `<div><strong>You:</strong> ${message}</div>`;
    messageInput.value = '';
    chatBox.scrollTop = chatBox.scrollHeight;

    fetch("{{ route('chatbot.send') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ message: message })
    })
    .then(res => res.json())
    .then(data => {
        chatBox.innerHTML += `<div><strong>Bot:</strong> ${data.reply}</div>`;
        chatBox.scrollTop = chatBox.scrollHeight;
    })
    .catch(() => {
        chatBox.innerHTML += `<div><em>Error getting response</em></div>`;
    });
});
</script>
@endsection

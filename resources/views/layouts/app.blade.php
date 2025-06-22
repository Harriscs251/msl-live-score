<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">

        {{-- Removed default Laravel navbar --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        document.getElementById('chat-form')?.addEventListener('submit', async function(e) {
            e.preventDefault();

            const input = document.getElementById('chat-input');
            const message = input.value.trim();
            if (!message) return;

            const messagesDiv = document.getElementById('chat-messages');
            messagesDiv.innerHTML += `<div><strong>You:</strong> ${message}</div>`;
            input.value = '';

            try {
                const response = await fetch('/chatbot', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message })
                });

                const data = await response.json();
                messagesDiv.innerHTML += `<div><strong>Bot:</strong> ${data.reply}</div>`;
                messagesDiv.scrollTop = messagesDiv.scrollHeight;
            } catch (error) {
                messagesDiv.innerHTML += `<div style="color: red;"><strong>Error:</strong> Chatbot unavailable.</div>`;
            }
        });
    </script>
</body>
</html>

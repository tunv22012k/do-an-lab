@extends('layouts.guest')
@section('title')
    index user
@stop

@section('content')
    <div style="background-color: #fafafa">
        <div>LAYOUT USER</div>
    </div>
    <h2>Laravel WebSocket Chat</h2>
    <input type="text" id="username" placeholder="Tên của bạn..." />
    <input type="text" id="message" placeholder="Nhập tin nhắn..." />
    <button class="sendMessage">Gửi</button>
    <ul id="messages"></ul>
    <button class="leaveRoom">leaveRoom</button>
@stop

@section('page_scripts')
    <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>
    <script type="module">
        $(function() {
            const socket = io('http://localhost:3000'); // Kết nối Socket.IO server
            let roomName = ''; // Định danh phòng chat

            // Khi kết nối Socket.IO thành công
            socket.on('connect', () => {
                console.log("Connected to Socket.IO Server");

                // Giả sử người dùng có ID là 1, muốn chat với người có ID 2
                const userId = 1;
                const otherUserId = 2;
                roomName = `chat_${userId}_${otherUserId}`;

                // Join vào phòng chat với người A và người B
                socket.emit('join', { room: roomName, userId: userId });
            });

            // Nhận tin nhắn từ server
            socket.on('message', (data) => {
                const messageList = document.getElementById('messages');
                const li = document.createElement('li');
                li.innerHTML = `<strong>${data.sender}:</strong> ${data.message} <em>(${new Date(data.timestamp).toLocaleTimeString()})</em>`;
                messageList.appendChild(li);
            });

            $(".sendMessage").on("click", function() {
                sendMessage();
            });

            function sendMessage() {
                const usernameInput = document.getElementById('username');
                const messageInput = document.getElementById('message');

                if (usernameInput.value.trim() === '' || messageInput.value.trim() === '') {
                    alert("Vui lòng nhập tên và tin nhắn!");
                    return;
                }

                const messageData = {
                    sender: usernameInput.value,
                    message: messageInput.value
                };

                // Gửi message đến Laravel bằng Axios
                axios
                    .post('{{ route("api.send-message") }}', messageData)
                    .then(response => {
                        // Sau khi tin nhắn được xử lý xong từ API, gửi qua Socket.IO
                        socket.emit('sendMessage', { room: roomName, sender: messageData.sender, message: messageData.message });
                    })
                    .catch(error => {
                        console.error('Error:', error.response ? error.response.data : error);
                    });

                messageInput.value = '';
            }

            // click leaveRoom
            $(".leaveRoom").on("click", function() {
                leaveRoom();
            });

            // Rời phòng chat
            function leaveRoom() {
                console.log("client click leave room");
                socket.emit('leave', { room: roomName });
            }
        });
    </script>
@stop

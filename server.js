const http = require('http').Server();
const io = require('socket.io')(http, {
    cors: {
        origin: "http://laravel-vue-chat",
        methods: ["GET", "POST"]
    }
});
const Redis = require('ioredis');

const redis = new Redis();
redis.subscribe('new-message', (err, count) => {
    if (err) {
        // Just like other commands, subscribe() can fail for some reasons,
        // ex network issues.
        console.error("Failed to subscribe: %s", err.message);
    } else {
        // `count` represents the number of channels this client are currently subscribed to.
        console.log(
            `Subscribed successfully! This client is currently subscribed to ${count} channels.`
        );
    }
});
redis.on('message', function (channel, message) {
    console.log('Message recieved: ' + message);
    console.log("Channel: " + channel);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

redis.on("messageBuffer", (channel, message) => {
    // Both `channel` and `message` are buffers.
    console.log(channel, message);
});

http.listen(3000, function () {
    console.log('listening on port 3000');
});
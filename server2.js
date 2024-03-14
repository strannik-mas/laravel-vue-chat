import { Server } from "socket.io";
import { createAdapter } from "@socket.io/redis-adapter";
import { Cluster } from "ioredis";

const io = new Server();

const pubClient = new Cluster([
    {
        host: "localhost",
        port: 6379,
    },
    {
        host: "localhost",
        port: 6381,
    },
]);
pubClient.subscribe('new-message');
pubClient.on('message', function (channel, message) {
    console.log('Message recieved: ' + message);
    console.log("Channel: " + channel);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

const subClient = pubClient.duplicate();

io.adapter(createAdapter(pubClient, subClient));
io.listen(3000, function () {
    console.log('listening on port 3000');
});
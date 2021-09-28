const express = require('express');
const app = express();

const http = require('http');
const server = http.createServer(app);
const {Server} = require('socket.io');
const io = new Server(server);
// npm install express docket.io

app.get('/tho', (req, res)=>{
     res.sendFile(__dirname+ '/1.html');
})

io.on('connection', (socket)=>{
    console.log("Connected");
    socket.on("Quat",(data)=>{
        console.log(data);
        io.emit("Led", data);
    })
})

server.listen(4000,'192.168.1.11',()=>{
    console.log("listening on port 4000 ");
    
})


var express = require('express');
var router = express.Router();

// npm install socket.io
// const {Server} = require('socket.io');
// const io = new Server(app);
// io.on('connection', (socket)=>{
//   console.log("connected");
//   socket.on("Led",(data)=>{
//     // nhận đc data thì gửi đi cho tất cả
//     io.emit('Ahihi',data);
//   })
// })

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Express' });
});

module.exports = router;

const express = require("express");
const app = express();
const http = require("http").createServer(app);
const io = require("socket.io")(http);
const mysql = require("mysql");
const clients = {};

const connection = mysql.createConnection({
    "host": "localhost",
    "user": "root",
    "password": "",
    "database": "divar"
});

connection.connect(function (error) {
});


io.on("connection", function (socket) {
    console.log("User connected: ", socket.id);

    socket.on('disconnect', () => {
        console.log('user disconnected');
    });

    socket.on("nickname", function (data) {
        clients[data] = socket.id
        console.log(clients)
    })


    socket.on("chat message", function (data) {
        //print receive message
        console.log("message:" + data)

        io.sockets.sockets.forEach(function (item) {

            if (item.id == socket.id) {

                //*** Messages must be Json
                //My messages
                console.log("me:" + data)
                item.emit("chat message", {message: data, from: "1"});
            } else {

                //Users messages
                //send message for all users
                item.emit("chat message", {message: data, from: "2"});
                console.log("you:" + data)

            }
        });

    });

    /*  //فرستادن emit
      //on گرفتن
      //پیغام از کی به کی بره
      socket.on("chat message", function (data) {

          var to = data["to"]
          var from = data["from"]
          var user = clients[to]
          var mySelf = clients[from]

          io.to(user).emit("chat message", {message: data["message"], from: data["from"]});
          io.to(mySelf).emit("chat message", {message: data["message"], from: data["from"]});
      })
  */

    //get data in client and insert it in mysql
    socket.on("data", function (data) {
        const words = data.split(',');
        const sender = words[0];
        const receiver = words[1];
        const message = words[2];
        const bannerID = words[3];
        const bannerTitle = words[4];
        const bannerImage = words[5];

        const post = {
            sender: sender,
            receiver: receiver,
            message: message,
            bannerID: bannerID,
            bannerTitle: bannerTitle,
            bannerImage: bannerImage
        };
        connection.query('INSERT INTO messages SET ?', post, function (err, result) {
        });
    });

});

http.listen(3000, function () {
    console.log("Listening to port 3000");
});
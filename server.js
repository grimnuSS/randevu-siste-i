var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/',function (req,res) {
    res.send('Anasayfa');
});

io.on('connection',(socket)=>{

    socket.on('new_appointment_create',function () {
        io.emit('admin_appointment_list');
    })

});
io.on('connection',(socket)=>{

    socket.on('randevu_list',function () {
        io.emit('randevu_list_update');
    })

});
http.listen(3000,function () {
    console.log("server çalışıyor...");
});

// var io =require ('socket.io')(6001)
var express=require('express')
var app=express();
var http=require('http').createServer(app)

var io =require('socket.io')(http, {cors: {origin: "*"}});
http.listen(6001,function(){
    io.on('error',function(socket){
        console.log('error')
    })
    io.on('connection',function(socket){
        console.log('Co nguoi vua ket noi '+socket.id)
    })
})
console.log('Connect to port 6001')




var Redis=require('ioredis')
var redis=new Redis(1000)

redis.psubscribe("*",function(error,count){
    
})

redis.on('pmessage',function(pattern,channel,message){
    console.log(pattern)
    console.log(channel)
    console.log(message)
    message=JSON.parse(message)
    io.emit(channel+":"+message.event,message.data.message)
    console.log('Send')
})

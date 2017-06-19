var express = require('express');
var app = express();
var rock = require('./rock.js');

//app.get("/", function(request, response){
//  console.log("Someone is requesting /");
//  response.writeHead(200, {"Content-Type": "text/html"})
//  response.write("<html><body><h1>Hello World</h1><body></html>")
//  response.end()
//})

app.set('port', (process.env.PORT || 5000))

app.use(express.static(__dirname + "/public"));
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');

app.get('/play', rock.handlePlay);

app.listen(app.get('port'), function(){
  console.log("Server is running on port: " + app.get('port'));
});
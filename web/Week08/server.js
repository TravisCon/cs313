var http = require("http");
var url = require("url");
var server = http.createServer(onRequest);

var port = 8888;
var portURL = ("localhost:" + port + "/");

function onRequest(request, response) {
  var returnedURL = url.parse(request.url).pathname;
  console.log(returnedURL);
  if (returnedURL == "/home"){
    response.writeHead(200, {"Content-Type":"text/html"});
    response.write("<h1>Welcome to the Home Page</h1>");
    response.end();
  } else if (returnedURL == "/getData"){
    response.writeHead(200, {"Content-Type":"application/json"});
    var obj = ('{"name": "Travis Confer", "class" : "CS313"}');
    response.write(obj);
    response.end();
  } else if (returnedURL == "/hi"){
    var newLocation = (request.headers['host'] + '/hello.html');
    console.log(newLocation);
    response.writeHead(301, {'Location' : newLocation});
    response.end();
  } else {
    response.writeHead(404, {"Content-Type":"text/html"});
    response.write("<h1>Page Not Found</h1>");
    response.end();
  }
}

server.listen(port);
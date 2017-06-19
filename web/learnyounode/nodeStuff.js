var module = require('./mymodule.js')
var directory = process.argv[2];
var filter = process.argv[3];

module(directory, filter, function(err, list) {
  if (err)
    return console.log("Error: " + err);

  list.forEach(function (file) {
    console.log(file);
  })
})
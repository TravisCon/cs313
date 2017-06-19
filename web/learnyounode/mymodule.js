module.exports = function (directory, extension, callback){
  var fs = require('fs')
  var path = require('path')
  fs.readdir(directory, function(err, data){
    if (err)
      return callback(err);

    data = data.filter(function (file) {
      return path.extname(file) == "." + extension;
    });

    callback(null, data);
  });
}
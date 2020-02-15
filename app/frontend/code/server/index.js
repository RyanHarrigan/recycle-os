let express = require("express");
let bodyParser = require("body-parser");
const cors = require("cors");

var app = express();
app.use(express.json());
app.use(cors());

app.use(bodyParser.json());

app.use(express.static("dist"));

app.listen(2424, function() {
  console.log("listening on port 2424!");
});
module.exports = app;

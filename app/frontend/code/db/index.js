const mysql = require("mysql");
const connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "password",
  database: "cats"
});
connection.connect(err => {
  if (err) {
    throw err;
  } else {
    console.log("db is connected!");
  }
});

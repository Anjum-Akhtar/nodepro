const mysql = require('mysql');

// Database Connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'nodepro'
});


db.connect((error)=>{
    if(error){
        console.error("Error connecting to Database:", error);
    }else{
        // console.log("Database connected");
        // db.query("CREATE DATABASE If NOT EXISTS nodepro");
        // if(error){
        //     console.error("Error creating database:", error);
        // }else{
        //     console.log("Database created");
        // }

        // db.query("CREATE TABLE IF NOT EXISTS users(id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL)");
        // if(error){
        //     console.error("Error creating database:", error);
        // }else{
        //     console.log("Table created");
        // }
    }
});

module.exports = db;
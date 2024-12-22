const express = require('express');
const router  = express.Router();
const bcrypt  = require('bcryptjs');        
const db      = require('../config/database');

// Register Page
router.get('/',(req,res)=>{
    res.send(`
        <h1>Register</h1>
        <form action="/register" method="POST">
            <label>Username:</label><br>
            <input type="text" name="uname" placeholder="Enter username" required><br>
            <label>Email:</label><br>   
            <input type="email" name="email" placeholder="Enter email" required><br>
            <label>Password:</label><br>
            <input type="password" name="password" placeholder="Enter password" required><br>
            <button type="submit">Register</button>
        </form>
    `);
});

router.post('/', (req,res)=>{
    const { uname, email, password} = req.body;

    // Hash Password
    bcrypt.hash(password, 10,(error, hash)=>{
        if(error){
            console.error("Error hashing password:", error);
            res.status(500).send('Internam server error');
        }else{
            const sql = "INSERT INTO users (username,email,password) VALUES(?,?,?)";
            const params = [uname, email, hash];
            db.query(sql, params, (error, result)=>{
                if(error){
                    console.error("Error registering user:", error);
                    res.status(500).send("Error");
                }else{
                    res.redirect("/login");
                }
            });
        }
    });
});

module.exports = router;
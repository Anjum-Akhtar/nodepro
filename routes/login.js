const express = require('express');
const router  = express.Router();
const db      = require('../config/database');
const bcrypt  = require('bcryptjs');

// Login Page
router.get('/', (req,res)=>{
    res.send(`
        <h1>Login</h1>
        <form action="/login" method="POST">
            <label>Email:</label><br>
            <input type="email" name="email" placeholder="Enter email" required><br>
            <label>Password:</label><br>
            <input type="password" name="password" placeholder="Enter password" required><br>
            <button type="submit">Login</button>
        </form>
    `);
});

router.post('/', (req,res)=>{
    
    const { email, password} = req.body;
    const sql = "SELECT * FROM users WHERE email = ?";

    db.query(sql, [email], (error, result)=>{
        if(error){
            console.error("Error logging in:", error);
            res.status(500).send("Error logging in");
        }else if(result.length === 0){ 
            res.status(400).send("User not found!");
        }else{
            const user = result[0];
            bcrypt.compare(password, user.password, (error, isMatch)=>{
                if(error){
                    console.error('Error comparing passwords:', err);
                    res.status(500).send('Internal Server Error');
                }else if(!isMatch){
                    res.status(400).send('Invalid password');
                }else{
                    req.session.user = {id: user.id, username: user.username};
                    res.redirect('/');
                }
            });
        }
    });
});

module.exports = router;
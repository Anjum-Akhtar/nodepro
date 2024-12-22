const express = require('express');
const router  = express.Router();

// Home Page
router.get('/', (req,res)=>{
    if(req.session.user){
        res.send(`<h1>Welcome ${req.session.user.username}!</h1><a href="/logout">Logout</a>`);
    }else{
        res.send('<h1>Welcome to My App</h1><a href="/login">Login</a> | <a href="/register">Register</a>');
    }
});

module.exports = router;
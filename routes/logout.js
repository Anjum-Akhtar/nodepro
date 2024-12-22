const express = require('express');
const router  = express.Router();

// Logout Page
router.get('/', (req,res)=>{
    req.session.destroy((error)=>{
        if(error){
            console.error('Error logging out:', err);
            res.status(500).send('Error logging out');
        }else{
            res.redirect('/');
        }
    });
});

module.exports = router;
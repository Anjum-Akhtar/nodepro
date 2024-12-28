const express = require('express');
const router  = express.Router();
const db      = require('../config/database');
const bcrypt  = require('bcryptjs');

// Login Page
router.get('/', (req, res) => {
    res.send(`
        <h1>Login</h1>
        <form id="loginForm">
            <label>Email:</label><br>
            <input type="email" name="email" placeholder="Enter email" required><br>
            <label>Password:</label><br>
            <input type="password" name="password" placeholder="Enter password" required><br>
            <button type="submit">Login</button>
        </form>
        <div id="message"></div>
        <script>
            document.getElementById('loginForm').addEventListener('submit', async (event) => {
                event.preventDefault();
                const formData = new FormData(event.target);
                const data = Object.fromEntries(formData.entries());
                try {
                    const response = await fetch('/login', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(data)
                    });
                    const result = await response.json();
                    const messageDiv = document.getElementById('message');
                    if (response.ok) {
                        // messageDiv.textContent = 'Login successful!';
                        window.location.href='/';
                    } else {
                        messageDiv.textContent = result.message || 'Error logging in';
                    }
                } catch (error) {
                    console.error('Error submitting form:', error);
                }
            });
        </script>
    `);
});


router.post('/', (req, res) => {
    const { email, password } = req.body;
    const sql = "SELECT * FROM users WHERE email = ?";

    db.query(sql, [email], (error, result) => {
        if (error) {
            console.error("Error logging in:", error);
            return res.status(500).json({ message: "Internal Server Error" });
        } 
        if (result.length === 0) { 
            return res.status(400).json({ message: "User not found!" });
        }

        const user = result[0];
        bcrypt.compare(password, user.password, (err, isMatch) => {
            if (err) {
                console.error('Error comparing passwords:', err);
                return res.status(500).json({ message: "Internal Server Error" });
            }
            if (!isMatch) {
                return res.status(400).json({ message: "Invalid password" });
            }
            req.session.user = { id: user.id, username: user.username };
            return res.status(200).json({ message: "Login successful" });
        });
    });
});


module.exports = router;
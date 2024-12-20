const express       = require('express');
const bodyParser    = require('body-parser');
const session       = require('express-session');
const mysql         = require('mysql');
const bcrypt        = require('bcryptjs');
// require('crypto').randomBytes(64).toString('hex');
// https://github.com/jonasschmedtmann/complete-node-bootcamp
const app = express();
const port = 3000;

// Middleware
app.use(bodyParser.urlencoded({ extended: false}));
app.use(express.json());

// Session Middleware
app.use(session({
    secret: 'secret',
    resave: true,
    saveUninitialized: true
}));

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

// Routes

// Home Page
app.get('/', (req,res)=>{
    if(req.session.user){
        res.send(`<h1>Welcome ${req.session.user.username}!</h1><a href="/logout">Logout</a>`);
    }else{
        res.send('<h1>Welcome to My App</h1><a href="/login">Login</a> | <a href="/register">Register</a>');
    }
});

// Register Page
app.get('/register',(req,res)=>{
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

app.post('/register', (req,res)=>{
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

// Login Page
app.get('/login', (req,res)=>{
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

app.post('/login', (req,res)=>{
    
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

// Logout Page
app.get('/logout', (req,res)=>{
    req.session.destroy((error)=>{
        if(error){
            console.error('Error logging out:', err);
            res.status(500).send('Error logging out');
        }else{
            res.redirect('/');
        }
    });
});

// Start Server
app.listen(port, ()=>{
    console.log('Server running on http://localhost:${port}');
});
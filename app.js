const express       = require('express');
const bodyParser    = require('body-parser');
const session       = require('express-session');
const homeRouter    = require('./routes/home');
const registerRouter= require('./routes/register');
const loginRouter   = require('./routes/login');
const logoutRouter  = require('./routes/logout');

const app = express();
const port = process.env.port || 3000;

app.set('view engine','ejs');

// Middleware
app.use(bodyParser.urlencoded({ extended: false}));
app.use(express.json());

// Session Middleware
app.use(session({
    secret: 'secret',
    resave: true,
    saveUninitialized: true
}));

// Routes

app.use('/', homeRouter);
app.use('/register', registerRouter);
app.use('/login', loginRouter);
app.use('/logout', logoutRouter);

// Start Server
app.listen(port, ()=>{
    console.log(`Server running on http://localhost:${port}`);
});
const express = require('express');
const path = require('path');
const session = require('express-session');
const bodyParser = require('body-parser');
const authController = require('authController');

const app = express();

app.use(session({
    secret: 'paulinho',
    resave: false,
    saveUninitialized: true
}));

app.use(bodyParser.urlencoded({ extended: true }));

app.use(express.static(path.join(__dirname, 'public')));

app.get('login', (req, res) => {
    res.sendFile(path.join(__dirname, 'views', 'login.html'));
});

app.post('login', authController.login);

app.use(authController.ensureAuthenticated);

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'views', 'index.html'));
});

app.get('/event-details.html', (req, res) => {
    res.sendFile(path.join(__dirname, 'views', 'event-details.html'));
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Servidor rodando na porta ${PORT}`);
});

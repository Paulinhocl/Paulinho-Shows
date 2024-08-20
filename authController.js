exports.login = (req, res) => {
    const { username, password } = req.body;

        if (username === 'paulinho' && password === 'paulinho') {
        req.session.isAuthenticated = true;
        res.redirect('/');
    } else {
        res.send(`<script>alert('Usuário ou senha inválidos'); window.location.href='/login';</script>`);
    }
};

exports.ensureAuthenticated = (req, res, next) => {
    if (req.session.isAuthenticated) {
        return next();
    } else {
        res.redirect('/login');
    }
};


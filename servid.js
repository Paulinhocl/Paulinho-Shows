const express = require('express');
const bodyParser = require('body-parser');
const db = require('./db');

const app = express();
app.use(bodyParser.json());

app.post('/evento', (req, res) => {
    const { nome, descricao, data, local, preco, disponibilidade } = req.body;
    const query = 'INSERT INTO Evento (nome, descricao, data, local, preco, disponibilidade) VALUES (?, ?, ?, ?, ?, ?)';
    db.query(query, [nome, descricao, data, local, preco, disponibilidade], (err, results) => {
        if (err) throw err;
        res.send('Evento inserido com sucesso!');
    });
});

app.put('/evento/:id', (req, res) => {
    const { id } = req.params;
    const { nome, descricao, data, local, preco, disponibilidade } = req.body;
    const query = 'UPDATE Evento SET nome = ?, descricao = ?, data = ?, local = ?, preco = ?, disponibilidade = ? WHERE id = ?';
    db.query(query, [nome, descricao, data, local, preco, disponibilidade, id], (err, results) => {
        if (err) throw err;
        res.send('Evento atualizado com sucesso!');
    });
});

app.delete('/evento/:id', (req, res) => {
    const { id } = req.params;
    const query = 'DELETE FROM Evento WHERE id = ?';
    db.query(query, [id], (err, results) => {
        if (err) throw err;
        res.send('Evento excluído com sucesso!');
    });
});

app.get('/eventos', (req, res) => {
    const query = 'SELECT * FROM Evento';
    db.query(query, (err, results) => {
        if (err) throw err;
        res.json(results);
    });
});

app.listen(3000, () => {
    console.log('Servidor rodando na porta 3000');
});

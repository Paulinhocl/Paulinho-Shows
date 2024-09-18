const express = require('express');
const router = express.Router();
const { listarTodosEventos, criarEvento, atualizarEventoExistente, deletarEvento } = require('./eventoController');

router.get('/eventos', listarTodosEventos);

router.post('/evento', criarEvento);

router.put('/evento/:id', atualizarEventoExistente);

router.delete('/evento/:id', deletarEvento);

module.exports = router;

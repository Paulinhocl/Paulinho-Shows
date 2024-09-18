const { inserirEvento, atualizarEvento, excluirEvento, listarEventos } = require('eventos.db');

const listarTodosEventos = (req, res) => {
  listarEventos((err, results) => {
    if (err) return res.status(500).send('Erro na lista de eventos');
    res.json(results);
  });
};

const criarEvento = (req, res) => {
  const novoEvento = req.body;
  inserirEvento(novoEvento, (err, result) => {
    if (err) return res.status(500).send('Erro na criação do evento');
    res.status(201).send('Evento criado com sucesso');
  });
};

const atualizarEventoExistente = (req, res) => {
  const id = req.params.id;
  const eventoAtualizado = req.body;
  atualizarEvento(id, eventoAtualizado, (err, result) => {
    if (err) return res.status(500).send('Erro na atualização do evento');
    res.send('Evento atualizado com sucesso');
  });
};

const deletarEvento = (req, res) => {
  const id = req.params.id;
  excluirEvento(id, (err, result) => {
    if (err) return res.status(500).send('Erro na exclusão do evento');
    res.send('Evento excluído com sucesso');
  });
};

module.exports = { listarTodosEventos, criarEvento, atualizarEventoExistente, deletarEvento };

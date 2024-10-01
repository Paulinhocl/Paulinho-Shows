const eventoForm = document.getElementById('eventoForm');
const feedbackDiv = document.getElementById('feedback');
const eventosTable = document.getElementById('eventosTable').getElementsByTagName('tbody')[0];

function showFeedback(message, success = true) {
    feedbackDiv.innerHTML = `<div class="alert ${success ? 'alert-success' : 'alert-danger'}">${message}</div>`;
    setTimeout(() => {
        feedbackDiv.innerHTML = '';
    }, 3000);
}

async function loadEventos() {
    try {
        const response = await fetch('http://localhost:3000/api/eventos');
        const eventos = await response.json();
        eventosTable.innerHTML = '';
        eventos.forEach(evento => {
            const row = eventosTable.insertRow();
            row.innerHTML = `
                <td>${evento.id}</td>
                <td>${evento.nome}</td>
                <td>${new Date(evento.data).toLocaleDateString()}</td>
                <td>${evento.local}</td>
                <td>${evento.preco.toFixed(2)}</td>
                <td>${evento.ingressos_disponiveis}</td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="editEvento(${evento.id})">Editar</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteEvento(${evento.id})">Excluir</button>
                </td>
            `;
        });
    } catch (error) {
        showFeedback('Erro ao carregar eventos', false);
    }
}

async function createEvento(event) {
    event.preventDefault();
    
    const nome = document.getElementById('nome').value;
    const data = document.getElementById('data').value;
    const local = document.getElementById('local').value;
    const preco = document.getElementById('preco').value;
    const descricao = document.getElementById('descricao').value;
    const ingressos = document.getElementById('ingressos').value;

    if (!nome || !data || !local || !preco || !ingressos) {
        showFeedback('Preencha todos os campos obrigatórios', false);
        return;
    }

    const evento = { nome, data, local, preco, descricao, ingressos_disponiveis: ingressos };

    try {
        const response = await fetch('http://localhost:3000/api/evento', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(evento)
        });

        if (response.ok) {
            showFeedback('Evento cadastrado com sucesso');
            eventoForm.reset();
            loadEventos();
        } else {
            showFeedback('Erro ao cadastrar evento', false);
        }
    } catch (error) {
        showFeedback('Erro ao conectar ao servidor', false);
    }
}

async function deleteEvento(id) {
    if (confirm('Tem certeza que deseja excluir este evento?')) {
        try {
            const response = await fetch(`http://localhost:3000/api/evento/${id}`, {
                method: 'DELETE'
            });

            if (response.ok) {
                showFeedback('Evento excluído com sucesso');
                loadEventos();
            } else {
                showFeedback('Erro ao excluir evento', false);
            }
        } catch (error) {
            showFeedback('Erro ao conectar ao servidor', false);
        }
    }
}

loadEventos();

eventoForm.addEventListener('submit', createEvento);

// Dados de exemplo para diferentes categorias
const produtosTecnologia = ['smartphone', 'tablet', 'laptop', 'fones de ouvido'];
const esportes = ['futebol', 'basquete', 'natação', 'tênis'];
const livros = ['ficção científica', 'romance', 'biografia', 'autoajuda'];

// Função para pesquisar e exibir resultados
function pesquisar(termo) {
    const resultadoDiv = document.getElementById('resultado-pesquisa');
    resultadoDiv.innerHTML = ''; // Limpa resultados anteriores

    // Pesquisa nas categorias e exibe resultados
    const resultados = [];
    [produtosTecnologia, esportes, livros].forEach(categoria => {
        categoria.forEach(item => {
            if (item.toLowerCase().includes(termo.toLowerCase())) {
                resultados.push(item);
            }
        });
    });

    if (resultados.length === 0) {
        resultadoDiv.textContent = 'Nenhum resultado encontrado.';
    } else {
        resultados.forEach(resultado => {
            const itemDiv = document.createElement('div');
            itemDiv.textContent = resultado;
            resultadoDiv.appendChild(itemDiv);
        });
    }
}

// Event listener para acionar a pesquisa quando o usuário digitar
const inputPesquisa = document.querySelector('.aba-pesquisa__input');
inputPesquisa.addEventListener('input', () => {
    pesquisar(inputPesquisa.value);
});

function openProject(projectName) {
  const modal = document.getElementById('projectModal');
  const projectDetails = document.getElementById('projectDetails');
  
  // Substituir conteúdo do modal com detalhes do projeto
  projectDetails.innerHTML = `<p>Detalhes completos sobre o ${projectName}.</p>`;
  
  // Exibir modal
  modal.style.display = 'flex';
}

function closeModal() {
  const modal = document.getElementById('projectModal');
  modal.style.display = 'none';
}

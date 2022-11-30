function apagarUsuario(user_data) {
  const confirmation = confirm('Deseja deletar este arquivo?')

  if (confirmation == true) {
    window.location.href = 'delete.php?id='+ user_data
    alert('Arquivo deletado com sucesso!')
  }
}





/*async function apagarUsuario(user_data) {
  await fetch('delete.php'+ user_data)
}*/
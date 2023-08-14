<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscador de usuarios do GITHUB</title>
</head>
<script>
  async function githubUserSearch() {
    const userName = document.getElementById('userName').value;
    const response = await fetch("https://api.github.com/users/" + userName);
    const user = await response.json();

    const list = document.getElementById("content");
    while (list.hasChildNodes()) {
      list.removeChild(list.firstChild);
    }

    const div = document.createElement('div');
    div.className = 'row';

    if (user.message) {
      div.innerHTML = "<span>Nenhum usuario encontrado</span>";
    } else {
      div.innerHTML =
        "<img src='" + user.avatar_url + "' width='100'<br><br>" +
        "<span><b>Nome: </b>" + user.name + "</span><br>" +
        "<span><b>URL: </b>" + user.url + "</span><br>" +
        "<span><b>Localidade: </b>" + user.location + "</span><br>" +
        "<span><b>BIO: </b>" + user.bio + "</span><br>";
    }

    document.getElementById('content').appendChild(div);
  }
</script>

<body>
  <span>Digite o nome do usuario do GITHUB</span><br>
  <input id="userName" type="text">
  <button type="button" onclick="githubUserSearch()">Buscar</button><br><br>
  <div id="content"></div>
</body>

</html>
# Teste Desenvolvedor Fullstack (PHP)

<p>API para cadastro de eletrodomésticos contendo recursos para criação, listagem, edição e remoção de registros.</p>

## Testar o código
O arquivo no github esta dividido em 2 diretórios, os dois diretórios estão completos, basta realizar o download e salvar em seu ambiente de trabalho. Após salvar em seu ambiente criei um banco de dados com o nome de "eletrodomesticos".
<p>Via linha de comando acesse a pasta do projeto e rode o comando <b>php artisan migrate</b></p>
<ul>
<li>Back-end</li>
<li>Front-end</li>
</ul>

## Back-end
<p>No back-end existem 7 rotas que podem ser testados via Postman ou outra aplicação de chamadas de API.</p>

### Rotas
<b>GET -> "/eletrodomestico": Retorna todos os dados cadastrados</b>

---

<b>POST -> "eletrodomestico/salvar": Salva os dados no banco de dados.</b>

### Parâmetros necessários
<ul>
<li>marca_id</li>
<li>nome</li>
<li>descricao</li>
<li>tensao</li>
</ul>

### Retorno
<p>Retorna um JSON como resposta contendo as seguintes informações</p>
<ul>
<li>status => (true || false)</li>
<li>mensagem => (string || NULL)</li>
<li>descricao => (string || NULL)</li>
<li>dados => (objeto)</li>
</ul>

---

<b>GET -> "/eletrodomestico/view/{id}": Retorna um único eletrodoméstico pelo seu ID</b>
### Parâmetros necessários
<ul>
<li>id => ID do eletrdoméstico</li>
</ul>
### Retorno
<p>Retorna um JSON como resposta contendo as seguintes informações</p>
<ul>
<li>status => (true || false)</li>
<li>mensagem => (string || NULL)</li>
<li>descricao => (string || NULL)</li>
<li>dados => (objeto)</li>
</ul>

---

<b>GET -> "/eletrodomestico/edit/{id}": Retorna um único eletrodoméstico pelo seu ID</b>
### Parâmetros necessários
<ul>
<li>id => ID do eletrdoméstico</li>
</ul>
### Retorno
<p>Retorna um JSON como resposta contendo as seguintes informações</p>
<ul>
<li>status => (true || false)</li>
<li>mensagem => (string || NULL)</li>
<li>descricao => (string || NULL)</li>
<li>dados => (objeto)</li>
</ul>

---

<b>POST -> "/eletrodomestico/update": Realiza a alteração do registro</b>
### Parâmetros necessários
<ul>
<li>id</li>
<li>marca_id</li>
<li>nome</li>
<li>descricao</li>
<li>tensao</li>
</ul>

### Retorno
<p>Retorna um JSON como resposta contendo as seguintes informações</p>
<ul>
<li>status => (true || false)</li>
<li>mensagem => (string || NULL)</li>
<li>descricao => (string || NULL)</li>
<li>dados => (objeto)</li>
</ul>

---

<b>POST -> "/eletrodomestico/delete": Remove o registro</b>
### Parâmetros necessários
<ul>
<li>id</li>
</ul>

### Retorno
<p>Retorna um JSON como resposta contendo as seguintes informações</p>
<ul>
<li>status => (true || false)</li>
<li>mensagem => (string || NULL)</li>
<li>descricao => (string || NULL)</li>
<li>dados => (objeto)</li>
</ul>

---

<b>POST -> "/eletrodomestico/search": Busca por marca ou nome do produto</b>

### Parâmetros necessários
<ul>
<li>nome_produto</li>
<li>marca</li>
</ul>

### Retorno
<p>Retorna um JSON como resposta contendo as seguintes informações</p>
<ul>
<li>status => (true || false)</li>
<li>mensagem => (string || NULL)</li>
<li>descricao => (string || NULL)</li>
<li>dados => (objeto)</li>
</ul>

---



# Teste Back-End

Olá,

Agradeço sinceramente pela oportunidade de participar deste processo seletivo.

Este repositório contém uma aplicação desenvolvida com Laravel na versão 10, que consiste em uma REST API para gerenciamento de produtos. Não há nenhuma interface de usuário incluída; portanto, todas as interações com a aplicação são feitas por meio de solicitações HTTP.

Para começar, siga os passos abaixo:

## Passos para Configuração

1. **Clonagem do Repositório:**
   - Clone este repositório em sua máquina local:
     ```bash
     git clone https://github.com/davipitbull/teste-back-end.git
     ```

2. **Instalação de Dependências:**
   - Navegue até o diretório do projeto clonado e execute o comando:
     ```bash
     composer install
     ```
     Este comando instalará todas as dependências do Laravel necessárias para o projeto.
     Se você não tiver o Composer instalado, instale-o no link a seguir: [https://getcomposer.org](https://getcomposer.org)

3. **Configuração do Banco de Dados:**
   - Renomeie o arquivo `.env.example` para `.env`.
   - Abra o arquivo `.env` em um editor de texto.
   - Preencha as informações de conexão do banco de dados, como nome do banco, usuário, senha, etc.
   - Salve e feche o arquivo.

4. **Geração da Chave da Aplicação:**
   - Gere uma chave única para a aplicação Laravel:
     ```bash
     php artisan key:generate
     ```
     Este comando irá gerar uma chave aleatória e atribuí-la à variável `APP_KEY` no arquivo `.env`.

5. **Execução das Migrações:**
   - Execute as migrações para criar a estrutura do banco de dados:
     ```bash
     php artisan migrate
     ```

6. **Importação de Dados (Opcional):**
   - Se desejar, você pode importar dados de uma API externa para preencher o banco de dados:
     ```bash
     php artisan products:import
     ```
   - Se preferir importar apenas um produto específico, você pode fornecer o ID do produto:
     ```bash
     php artisan products:import --id=1
     ```

 ## Servidor Web e Banco de Dados

Para executar a aplicação localmente, você precisará de um servidor web e um servidor de banco de dados. Recomendamos a utilização do XAMPP, que é uma solução fácil de instalar e configurar, incluindo o Apache (servidor web) e o MySQL (servidor de banco de dados).

Você pode baixar e instalar o XAMPP a partir do seguinte link: [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)

Após instalar o XAMPP, inicie os serviços do Apache e MySQL pelo painel de controle do XAMPP antes de executar a aplicação Laravel.

## Execução da Aplicação

Para executar a aplicação localmente, você pode utilizar o comando `php artisan serve` no terminal:

```bash
php artisan serve
```

Este comando iniciará um servidor de desenvolvimento embutido, permitindo que você acesse a aplicação através do URL padrão http://127.0.0.1:8000.


## Rotas Disponíveis

A aplicação oferece as seguintes rotas para interação:

- `GET /api/produtos`: Retorna todos os produtos.
- `POST /api/produtos`: Cria um novo produto.
- `PUT /api/produtos/{id}`: Atualiza um produto existente.
- `DELETE /api/produtos/{id}`: Remove um produto.
- `POST /api/produtos/search/name-and-category`: Busca produtos por nome e categoria.
- `POST /api/produtos/search/category`: Busca produtos por categoria.
- `POST /api/produtos/search/image`: Filtra produtos com ou sem imagem.
- `GET /api/produtos/{id}`: Retorna um produto específico pelo ID.

## Ferramenta Recomendada para Testes

Recomendamos o uso do Postman para testar as funcionalidades da API. Você pode importar a coleção de requisições fornecida no arquivo `test-backend.postman_collection.json` para começar a interagir com a API.

---

Agradeço novamente pela oportunidade de participar deste processo seletivo. Estou à disposição para qualquer esclarecimento adicional.

Atenciosamente,
David Rodrigues De Souza Junior



# Inside

Inside é uma aplicação projetada para facilitar testes de penetração automatizando tarefas básicas.

## Tecnologias Utilizadas

- **C++:** Utilizado para análises de baixo nível do sistema operacional, como interações com o terminal e manipulação de arquivos.
  
- **Laravel:** Framework PHP utilizado para criar uma dashboard de interação com o usuário, parsing de inputs e sanitização de dados.
  
- **Bash Script:** Usado para automatizar a instalação de recursos necessários para a aplicação.

## Instruções de Instalação

1. Clone o repositório:

    ```
    git clone https://github.com/nathanrsnt/inside-app.git
    ```

2. Certifique-se de ter PHP, PHP-cURL, PHP-XML e Composer instalados. Se não estiverem instalados, você pode baixá-los e instalá-los seguindo as instruções oficiais.

3. Navegue até o diretório da aplicação:

    ```
    cd inside-app
    ```

4. Execute o comando Composer para instalar as dependências:

    ```
    composer update
    ```

5. Gere uma chave para a aplicação Laravel:

    ```
    php artisan key:generate
    ```

6. Inicie o servidor embutido do Laravel:

    ```
    php artisan serve
    ```

Agora você pode acessar a aplicação em http://localhost:8000

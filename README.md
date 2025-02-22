# Notas App - Laravel e Livewire

Este é um projeto simples de gerenciamento de notas desenvolvido com [Laravel](w) e [Livewire](w). Ele implementa um CRUD completo, permitindo criar, ler, atualizar e excluir notas de maneira eficiente e dinâmica.

## Tecnologias Utilizadas

- [Laravel 11](w)
- [Bootstrap](w)
- [MySQL](w)

## Recursos

- Cadastro de notas
- Listagem de notas
- Edição de notas
- Exclusão de notas
- Validação de formulários com Laravel e Livewire
- Interface responsiva com Tailwind CSS

## Instalação

1. Clone o repositório:
   ```sh
   git clone https://github.com/SamuelCDiias/notes.git
   cd notes
   ```

2. Instale as dependências do Laravel:
   ```sh
   composer install
   ```

3. Copie o arquivo de configuração e configure o banco de dados:
   ```sh
   cp .env.example .env
   ```
   Atualize as variáveis de ambiente do banco de dados no arquivo `.env`.

4. Gere a chave da aplicação:
   ```sh
   php artisan key:generate
   ```

5. Execute as migrações e popule o banco de dados:
   ```sh
   php artisan migrate --seed
   ```

6. Inicie o servidor:
   ```sh
   php artisan serve
   ```

7. Acesse a aplicação em: [http://localhost:8000](http://localhost:8000)


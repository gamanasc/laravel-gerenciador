## Gerenciador de projetos e tarefas

Gerenciador de projetos e tarefas, utilizando o framework Laravel 10, SQL Server, Eloquent ORM e Tailwind.

O projeto possui as seguintes funções:

- CRUD de Projetos.
- CRUD de Tarefas dentro de um projeto.
- Atribuição de tarefas para usuários.
- Notificação por e-mail (no modelo mensageria em fila) para os usuários.
- Sistema de login, cadastro, alteração de perfil, recuperação e redefinição de senha, utilizando Laravel Breeze.
- Exportação de relatório de tarefas, baseado no status (pendente, em progresso ou concluído)
- Testes automatizados

## Variáveis de Ambiente

Para rodar esse projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

`API_KEY`

`ANOTHER_API_KEY`

## Imagens do sistema

### Projetos
![Projetos](https://github.com/gamanasc/laravel-gerenciador/blob/master/public/img/projetos.png)

### Tarefas do projeto
![Tarefas do projeto](https://github.com/gamanasc/laravel-gerenciador/blob/master/public/img/tarefas.png)

### Usuários vinculados à tarefa
![Usuários vinculados à tarefa](https://github.com/gamanasc/laravel-gerenciador/blob/master/public/img/usuarios.png)


## Variáveis de Ambiente

Para rodar esse projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

### Banco de dados SQL Server

`DB_CONNECTION`
`DB_HOST`
`DB_PORT`
`DB_DATABASE`
`DB_USERNAME`
`DB_PASSWORD`

### SMTP (Mailtrap utilizado)

`MAIL_MAILER`
`MAIL_HOST`
`MAIL_PORT`
`MAIL_USERNAME`
`MAIL_PASSWORD`
`MAIL_ENCRYPTION`

### Fila de notificações

`QUEUE_CONNECTION` = `database`

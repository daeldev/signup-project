# Signup Project (Projeto MVC Manual)

Este repositório contém a implementação inicial do projeto **Signup Form** seguindo o padrão **MVC manual**.  
O projeto faz parte do desafio do site [Frontend Mentor](https://www.frontendmentor.io/challenges/intro-component-with-signup-form-5cf91bd49edda32581d28fd1).

## Sobre
- **Objetivo:** Formulário de cadastro com validação no frontend e backend em PHP.
- **Tecnologias:** PHP, HTML, CSS, JavaScript.
- **Banco de dados:** PostgreSQL (planejado).

## Estrutura
- `app/model/` — Modelos de dados
- `app/service/` — Lógica de negócio e comunicação com banco
- `app/controller/` — Controle de requisições
- `public/` — Arquivos públicos (index, CSS, JS)

## Observações
- Esta é a versão **manual**, antes da migração para Laravel.
- Arquivos de configuração do banco e dependências não estão inclusos (`.env`, `vendor/`).
- Próximos passos: migração do projeto para Laravel para seguir boas práticas e rotas RESTful.

## Como rodar
- Usar servidor PHP local (ex: `php -S localhost:8000 -t public`) ou XAMPP.
- Configurar conexão com o banco de dados nos arquivos de service.

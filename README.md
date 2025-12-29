# Signup Project (Laravel + Docker)

Este repositório contém o projeto **Signup Form**, atualmente em processo de migração
para **Laravel**, utilizando **Docker** como ambiente de desenvolvimento.

O projeto é baseado no desafio:
[Frontend Mentor – Intro component with signup form](https://www.frontendmentor.io/challenges/intro-component-with-signup-form-5cf91bd49edda32581d28fd1)

---

## 🧱 Stack

- **Backend:** Laravel (PHP 8.2)
- **Servidor:** PHP-FPM + Nginx
- **Banco de dados:** PostgreSQL
- **Ambiente:** Docker & Docker Compose

---

## 📁 Estrutura

- `app/` — Código da aplicação Laravel
- `public/` — Ponto de entrada da aplicação
- `database/` — Migrations e seeders
- `nginx/` — Configuração do Nginx
- `docker-compose.yml` — Orquestração dos containers
- `Dockerfile.dev` — Imagem PHP para desenvolvimento

---

## 🚀 Como rodar o projeto (DEV)

### 1️⃣ Clonar o repositório
```bash
git clone <url-do-repositorio>
cd signup-project
```

### 2️⃣ Criar o arquivo `.env`
```bash
cp .env.example .env
```

Edite apenas as seguintes variáveis:
DB_CONNECTION  
DB_HOST  
DB_PORT  
DB_DATABASE  
DB_USERNAME  
DB_PASSWORD  
APP_URL  

### 3️⃣ Criar diretórios necessários
```bash
mkdir bootstrap/cache
```

### 4️⃣ Subir os containers
```bash
docker compose up -d --build
```

### 5️⃣ Instalar dependências
```bash
docker compose exec app composer install
```

### 6️⃣ Gerar APP_KEY
```bash
docker compose exec app php artisan key:generate
```

### 7️⃣ Rodar migrations
```bash
docker compose exec app php artisan migrate
```

### 8️⃣ Acessar a aplicação
```bash
http://localhost:8080
```

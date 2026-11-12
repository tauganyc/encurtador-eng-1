# 🔗 Encurtador de URLs

Aplicação web em **Laravel** para encurtar links, com área autenticada por usuário e **relatório diário de cliques** de cada link.

## Funcionalidades

- Cadastro e login de usuários (Laravel Breeze)
- Encurtamento de URLs com *slug* único: `https://seu-dominio/r/{slug}`
- Listagem e exclusão dos links do usuário (cada usuário só vê e apaga os próprios links)
- Redirecionamento público com **contagem de cliques agrupada por dia**
- Página de relatório com o histórico de acessos de cada link

## Stack

- PHP 8.1+ · Laravel 10 · Laravel Breeze
- MySQL
- Blade · Bootstrap 5

## Modelo de dados

```
users ──< routes (url, slug) ──< reports (date, clicks)
```

## Como rodar

```bash
git clone https://github.com/tauganyc/encurtador-eng-1.git
cd encurtador-eng-1

composer install
npm install && npm run build

cp .env.example .env
php artisan key:generate
# configure DB_DATABASE, DB_USERNAME e DB_PASSWORD no .env

php artisan migrate
php artisan serve
```

Acesse `http://localhost:8000`, crie uma conta e comece a encurtar links.

## Rotas principais

| Método | Rota | Descrição |
|---|---|---|
| GET | `/` | Lista os links do usuário (autenticado) |
| POST | `/store` | Cria um link encurtado |
| DELETE | `/delete/{id}` | Remove um link |
| GET | `/report/{id}` | Relatório de cliques do link |
| GET | `/r/{slug}` | Redireciona para a URL original e registra o clique |

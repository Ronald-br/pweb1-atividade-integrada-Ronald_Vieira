# Sistema Acadêmico - Evolução (PWEB1)

Este é um projeto final para a disciplina de Programação Web 1, que demonstra a evolução de um sistema web utilizando o framework **Laravel** e a linguagem **PHP**.

## Objetivo
O objetivo principal deste projeto é evoluir um sistema pré-existente agregando recursos modernos e boas práticas de desenvolvimento backend, tais como:
- Rotas, Views (Blade) e Controllers
- Banco de dados relacional (SQLite) e Migrations
- ORM Eloquent e relacionamentos complexos (N:M)
- Padrão arquitetural com Service Layer (`MatriculaService`)
- Validação de dados de requisição
- Interface com estilização Rica (CSS Puro) e Responsiva
- Testes Automatizados Funcionais
- Versionamento com Git e preparado para Deploy

## Principais Funcionalidades
- **Gestão de Alunos:** Cadastro, listagem, edição e exclusão de alunos.
- **Gestão de Disciplinas:** Cadastro, listagem, edição e exclusão de disciplinas.
- **Matrículas:** Interface unificada para matricular e desmatricular alunos nas disciplinas disponíveis, evidenciando o relacionamento `belongsToMany` no Eloquent.

## Tecnologias Utilizadas
- **PHP 8.2+**
- **Laravel 11+**
- **SQLite** (Banco de dados local)
- **Vanilla CSS** (Design Premium)

## Instruções para Execução Local

Siga os passos abaixo para testar a aplicação em seu ambiente:

1. **Clone o repositório:**
   ```bash
   git clone <URL_DO_REPOSITORIO>
   cd pweb1-atividade-integrada-Ronald_Vieira
   ```

2. **Instale as dependências do Composer:**
   ```bash
   composer install
   ```

3. **Configure as Variáveis de Ambiente:**
   Copie o arquivo de exemplo e crie o banco de dados local:
   ```bash
   cp .env.example .env
   ```
   No arquivo `.env`, certifique-se de que a conexão do banco seja `DB_CONNECTION=sqlite` e remova outras variáveis como `DB_HOST`, `DB_PORT`, `DB_DATABASE`, etc., ou as deixe com o padrão.

4. **Gere a chave da aplicação e rode as migrações:**
   ```bash
   php artisan key:generate
   php artisan migrate
   ```

5. **Inicie o servidor local:**
   ```bash
   php artisan serve
   ```
   O sistema estará acessível em `http://localhost:8000`.

## Informações sobre Testes

Para garantir a confiabilidade da aplicação, foram desenvolvidos testes funcionais automatizados para as principais entidades. Para executá-los, utilize:

```bash
php artisan test
```

## Informações sobre o Processo de Deploy

A aplicação está pronta para ser implantada em serviços compatíveis com PHP e Laravel (como **Render**, **Heroku**, ou **Railway**).

**Procedimento geral:**
1. Crie o aplicativo na plataforma escolhida (ex: Render).
2. Configure o Build Command: `composer install --optimize-autoloader --no-dev`.
3. Configure o Start Command: Utilizar servidor Apache/Nginx apontando para a pasta `public`, ou para testes simples `php artisan serve --host=0.0.0.0 --port=$PORT`.
4. Adicione as variáveis de ambiente (APP_KEY, APP_ENV=production, DB_CONNECTION=sqlite).
5. Como estamos usando SQLite, garanta que a plataforma suporte discos persistentes ou altere o banco de dados no painel da provedora de cloud para PostgreSQL/MySQL, atualizando a URL de conexão na aba de Environment Variables.

**Endereço da aplicação publicada:** [A SER INSERIDO PELO ESTUDANTE APÓS O DEPLOY]

# Sistema Acadêmico Integrado

Prova Final da disciplina de Programação Web 1 — Evolução e Avaliação de uma Aplicação Web em Laravel.

## Descrição do sistema

O projeto partiu de um repositório com atividades anteriores da disciplina, organizadas em branches isoladas (`feature/parte-1-rotas-views`, `feature/parte-2-controllers`, `feature/parte-4-formularios`, `feature/parte-5-resource`), cada uma cobrindo um conceito diferente (rotas, controllers, formulários, resource controllers) sem integração entre si, sem banco de dados, sem validações e sem testes.

A evolução consistiu em unificar essas partes em uma aplicação única e funcional: um **Sistema Acadêmico** para gerenciar Alunos e Disciplinas, incluindo o relacionamento de matrícula entre eles.

## Objetivo

Evoluir uma aplicação Laravel previamente fragmentada em um sistema coeso, aplicando conceitos de banco de dados, Eloquent, relacionamentos N:M, camada de serviço, validação, testes automatizados, versionamento com Git e deploy em produção.

## Tecnologias utilizadas

- PHP 8.2
- Laravel
- SQLite
- Eloquent ORM
- Blade
- Docker
- Git / GitHub
- Render (hospedagem)

## Funcionalidades principais

- CRUD completo de Alunos (nome, e-mail, matrícula, data de nascimento)
- CRUD completo de Disciplinas (nome, código, carga horária)
- Matrícula e desmatrícula de alunos em disciplinas (relacionamento N:M)
- Validação de dados (e-mail único, matrícula única, código de disciplina único)
- Interface unificada com layout compartilhado e mensagens de sucesso/erro

## Estrutura do banco de dados

- `alunos` — id, nome, email, matricula, data_nascimento
- `disciplinas` — id, nome, codigo, carga_horaria
- `aluno_disciplina` — tabela pivô do relacionamento N:M entre alunos e disciplinas

## Arquitetura

- **Models:** `Aluno` e `Disciplina`, com `belongsToMany` entre si
- **Service Layer:** `app/Services/MatriculaService.php`, responsável pelas regras de negócio de matrícula (`matricular()` e `desmatricular()`), evitando duplicidade de matrícula
- **Controllers:** `AlunoController` e `DisciplinaController`, com validação inline e injeção do `MatriculaService`
- **Views:** Blade, com layout compartilhado (`layouts/app.blade.php`) e CSS próprio (`public/css/style.css`)

## Como executar localmente

```bash
git clone https://github.com/Ronald-br/pweb1-atividade-integrada-Ronald_Vieira.git
cd pweb1-atividade-integrada-Ronald_Vieira
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan serve
```

A aplicação estará disponível em `http://localhost:8000`.

## Configuração do banco de dados

O projeto utiliza SQLite por padrão (`DB_CONNECTION=sqlite`), sem necessidade de configurar um servidor de banco separado. Basta garantir que o arquivo `database/database.sqlite` exista antes de rodar as migrations.

## Testes

Foram implementados testes automatizados de Feature, em `tests/Feature/AlunoTest.php`:

- `test_pode_criar_aluno()` — valida a criação de um aluno via requisição HTTP e sua persistência no banco
- `test_pode_matricular_aluno_em_disciplina()` — valida o relacionamento N:M de matrícula via requisição HTTP

Para rodar os testes:

```bash
php artisan test
```

## Versionamento

O projeto utilizou Git desde o início, evoluindo a partir das branches de atividades anteriores até a consolidação na branch `main`. Principais marcos do histórico:

- Estrutura inicial do projeto Laravel
- Criação do README com informações do projeto
- Evolução do projeto: adição de Aluno, Disciplina e relacionamento
- Adição do Dockerfile para deploy no Render
- Ajustes de build de assets e configuração de HTTPS em produção

## Deploy

- **Serviço utilizado:** Render (Web Service via Docker)
- **Endereço da aplicação publicada:** https://pweb1-atividade-integrada-ronald-vieira.onrender.com
- **Procedimento de implantação:**
  1. Criação de um `Dockerfile` baseado em `php:8.2-cli`, com instalação do Composer e das dependências do projeto
  2. Configuração das variáveis de ambiente no Render: `APP_KEY`, `APP_ENV=production`, `APP_DEBUG=false`, `DB_CONNECTION=sqlite`, `APP_URL`
  3. Ajuste em `app/Providers/AppServiceProvider.php` para forçar geração de URLs em HTTPS em produção (`URL::forceScheme('https')`), necessário porque o proxy do Render repassa as requisições internamente em HTTP
- **Dificuldades encontradas e soluções:**
  - O Render não possui runtime nativo para PHP, exigindo o uso de Docker
  - Conteúdo misto (mixed content): os links gerados pela aplicação saíam como `http://`, sendo bloqueados pelo navegador em uma página servida via `https://`; corrigido forçando o schema HTTPS no `AppServiceProvider`
  - Erro de build causado por um caractere BOM (Byte Order Mark) inserido acidentalmente em um arquivo PHP editado via terminal; corrigido recriando o arquivo em UTF-8 sem BOM

## Uso de Inteligência Artificial

Durante o desenvolvimento deste projeto, foram utilizadas duas ferramentas de Inteligência Artificial generativa como apoio técnico, em momentos distintos, devido ao esgotamento do limite de uso da primeira ferramenta.

### Google Gemini

Utilizado na fase inicial de evolução do projeto, sendo responsável pelo apoio na implementação de:

- Migrations das tabelas `alunos`, `disciplinas` e `aluno_disciplina`
- Models `Aluno` e `Disciplina` com relacionamento `belongsToMany`
- Camada de serviço `MatriculaService`, com os métodos `matricular()` e `desmatricular()`
- Controllers `AlunoController` e `DisciplinaController`, com validação de dados
- Rotas de CRUD e de matrícula/desmatrícula
- Views Blade (listagem, criação, edição e detalhes de alunos e disciplinas) e o CSS da interface
- Testes automatizados de Feature (`AlunoTest.php`)

**Motivo da troca:** o acesso ao Gemini atingiu o limite de uso disponível antes da conclusão do trabalho.

### Claude (Anthropic)

Utilizado na continuidade do desenvolvimento a partir do ponto em que o Gemini parou, sendo responsável pelo apoio em:

- Resolução de conflitos de versionamento Git, incluindo o merge de históricos divergentes entre repositório local e remoto
- Diagnóstico e correção de uma estrutura de submódulo Git indevida, causada por um repositório aninhado dentro da pasta do projeto
- Configuração do deploy em produção via Docker no Render, incluindo a criação do `Dockerfile`
- Diagnóstico e correção de um bug de conteúdo misto (HTTP/HTTPS) que impedia o carregamento do CSS em produção
- Diagnóstico e correção de um erro de build causado por BOM em arquivo PHP

### Verificação e responsabilidade

Todas as sugestões fornecidas pelas ferramentas de IA foram revisadas, testadas e validadas manualmente antes de serem incorporadas ao projeto. O funcionamento de cada alteração foi conferido diretamente na aplicação, tanto em ambiente local quanto em produção, antes da conclusão de cada etapa. O estudante é responsável por todas as decisões técnicas e pelo código final entregue, sendo capaz de explicar cada componente implementado.

> ⚠️ **Aviso sobre o plano gratuito:** o serviço de hospedagem (Render, plano gratuito) coloca a aplicação em modo de espera após 15 minutos sem uso. Por isso, o primeiro acesso após um período de inatividade pode levar cerca de 30 segundos para carregar, enquanto o sistema "acorda". Após esse primeiro carregamento, a navegação volta ao normal. Esse comportamento é esperado em hospedagens gratuitas e não representa um erro da aplicação.

## Autor

Ronald Vieira

# Atividade Integrada - Laravel MVC (IFCE ADS 2026.1)

Aluno: Ronald Vieira  
Curso: Análise e Desenvolvimento de Sistemas (ADS) - 4º Semestre  
Disciplina: Programação Web I  
Professor: Renato William Rodrigues de Souza  
Instituição: IFCE - Campus Boa Viagem  

Projeto desenvolvido para a disciplina de Programação Web I do curso de ADS do IFCE. O sistema consiste em um site institucional fictício chamado TechEdu, utilizando o padrão MVC com Laravel, contendo rotas, views, controllers, parâmetros em rotas, formulários e resource controller, além de versionamento com Git e GitHub.

O projeto foi desenvolvido utilizando PHP 8+, Laravel e Composer.

Para executar o projeto localmente, é necessário clonar o repositório, instalar dependências com composer install, configurar o arquivo .env se necessário e iniciar o servidor com php artisan serve. Após isso, o sistema pode ser acessado em http://127.0.0.1:8000.

As principais rotas implementadas incluem página inicial (/), sobre (/sobre), contato (/contato), missão e valores institucionais (/institucional/missao e /institucional/valores). Também foram implementadas rotas com controllers como /empresa, /servicos, /portfolio e /blog, além de rotas de cursos (/cursos, /cursos/novo, /cursos/listagem). O sistema também possui rotas com parâmetros como /usuario/{nome} e /curso/{id}, que demonstram passagem de dados via URL.

Na parte de formulários, foi implementado um cadastro de produtos utilizando GET e POST em /produtos/create e /produtos, com envio de dados via Request e proteção CSRF. Também foi criado um resource controller para alunos, com operações básicas como listagem, criação e exibição por ID utilizando Route::resource.

O projeto foi organizado em branches separadas por parte da atividade e versionado utilizando commits seguindo boas práticas. Também foi preparado para entrega via GitHub com repositório público e Pull Requests abertos, conforme exigido pelo professor.

Checklist final da atividade: Parte 1 (rotas e views), Parte 2 (controllers), Parte 3 (parâmetros em rotas), Parte 4 (formulários GET/POST) e Parte 5 (resource controller) todas implementadas com sucesso.
# sistema-web
Sistema CRUD com criação de noticias e upload de imagens

Para esse sistema funcionar é necessário executar o banco de dados que está em: "models/bd-sistema-web.sql";

Como executar o banco?
-> Abra o HEIDI (ou outro programa) e abra um arquivo (crtl+o) e selecione o BD - ("sistema-web/models/bd-sistema-web.sql") - abra o arquivo e aperte F9 para executar.

# Esse sistema cumpre os requisitos dados em aula:

- Projeto em MVC
- Formatação em bootstrap
- Blog
- Sistema de upload
- Arquivo enviado para o diretório e para o BD com nome aleatório {usando md5() e uniqid()}   
- Permite apenas o envio de imagens .PNG (pathinfo)
- A postagem é excluida do SQL e do diretorio usando unlink()




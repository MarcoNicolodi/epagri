Instruções:

- Descompacte o arquivo para o seu servidor local
- Importe o arquivo epagri.sql para o seu banco de dados MySQL
- Mude a permissão do projeto para 777
- Troque as credenciais e configurações de banco de dados do array Datasources do arquivo config/app.php
- Tenha certeza de que:
	- O mod_rewrite do apache esteja instalado e ativo
	- As permissoes do mod_rewrite sejam Allow from All
	- O seu php tenha as extensões Intl, PDO e Mcrypt instaladas
- Acesse a url seuservidor/epagri/usuarios/add para criar um usuario ou logue no sistema com as credenciais adriano@email.com e senha 123

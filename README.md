Kairos
=======================

Projeto
------------
Este projeto tem como objetivo auxiliar equipes de gestão em desenvolvimento de software, para o levantamento de requisitos,
mudanças no software e apontamentos de bugs.

### Apache Setup

Exemplo de configuração do apache

    <VirtualHost *:80>
        ServerName zf2-tutorial.localhost
        DocumentRoot /path/to/zf2-tutorial/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/zf2-tutorial/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>

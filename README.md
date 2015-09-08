# OpenDojo
Sistema para gerenciamento de academias de arte marcial - Dojo

##Instalação

Descompacte o arquivo zip e mova o conteúdo do diretório app para dentro do diretório do apache

Altere a configuração dos seguintes arquivos

* application/config/database.php - Configurações do banco de dados
* application/config/opendojo.php - Configuração de themas e uso de CDN

Importe no mysql o arquivo de criação do banco de dados BD/install.sql

Modelagem feita com Mysql Workbench

##Frameworks utilizados
* [CodeIgniter 3.0.0](http://www.codeigniter.com/) - Framework PHP
* [Bootstrap 3.3.5](http://getbootstrap.com/) - Framework CSS e JavaScript
* [Bootswatch 3.3.5](http://bootswatch.com/) - Themes for Bootstrap
* [Bootstrap Confirmation 2.1.3](https://github.com/mistic100/Bootstrap-Confirmation) - Plugin JavaScript para diálogo de confirmação
* [Font Awesome 4.4.0](http://fortawesome.github.io/Font-Awesome/) - Framework CSS com ícones
* [JQuery 1.11.3](https://jquery.com/) - Framework JavaScript
* [Jquery Maskedinput 1.4.1](https://github.com/digitalBush/jquery.maskedinput) - Mascara para inputs
* [Bootstrap Datepicker 1.4.0](https://github.com/eternicode/bootstrap-datepicker) - Calendário para campos de dada
* [MY_Model](https://github.com/avenirer/CodeIgniter-MY_Model) - Classe para auxílio no uso de banco de dados.


##Padronização de nomes e diretórios
Alguns são necessários pelo próprio codeigniter outros foram escolhidos por mim


* Model
  * Nome de arquivo
    * Inicial maiuscula
    * Sufixo '_model.php'
    * Diretório: application/models/
    * Exemplo: Artemarcial_model.php
  * Nome da classe
    * Inicial maiuscula
    * Sufixo '_Model'
    * Exemplo: 'class Grupo_Model extends MY_Model'
  * Carregamento
    * Tudo minúsculo
    * Sufixo '_model'
    * Exemplo: '$this->load->model('grupo_model');'
* View
  * Nome de arquivo
    * Inicial maiuscula
    * Sufixo 1: Função (List, Edit, Delete, Save)
    * Sufixo 2 '_view.php'
    * Diretório: application/views/
    * Exemplo: GrupoList_view.php
* Controller
  * Nome de arquivo
    * Inicial maiuscula
    * Sufixo '.php'
    * Diretório: application/controllers/
    * Exemplo: Grupo.php
  * Nome da classe
    * Inicial maiuscula
    * Exemplo: 'class Grupo extends CI_Controller'



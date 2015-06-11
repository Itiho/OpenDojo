# OpenDojo
Sistema para gerenciamento de academias de arte marcial - Dojo

Modelagem feita com Mysql Workbench

##Frameworks utilizados




##Padronização de nomes e diretórios
Alguns são necessários pelo próprio codeigniter outros foram escolhidos por mim

* Model
  * Nome de arquivo
    * Inicial maiuscula
    * Sufixo '_model.php'
    * Diretório: application/models/
    * Exemplo: Grupo_model.php
  * Nome da classe
    * Inicial maiuscula
    * Sufixo '_Model'
    * Exemplo: 'class Grupo_Model extends MY_Model'
  * Carregamento
    * Tudo minúsculo
    * Sufixo '_model'
    * Exemplo: '$this->load->model('grupo_model');'
*View
  * Nome de arquivo
    * Inicial maiuscula
    * Sufixo 1: Função (List, Edit, Delete, Save)
    * Sufixo 2 '_view.php'
    * Diretório: application/views/
    * Exemplo: GrupoList_view.php
*Controller
  * Nome de arquivo
    * Inicial maiuscula
    * Sufixo '.php'
    * Diretório: application/controllers/
    * Exemplo: Grupo.php
  * Nome da classe
    * Inicial maiuscula
    * Exemplo: 'class Grupo extends CI_Controller'


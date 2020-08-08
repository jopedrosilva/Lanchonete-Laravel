## Lanchonete

### resumo

O projeto Lanchonete foi desenvolvido como parte de uma avaliação para programador 
da empresa Rits Tecnologia, na área de desenvolvedor Backend Challenge. Esse 
documento apresenta a descrição do desenvolvimento do projeto(site).

### Tecnologia

PHP >= 7.2.19 <br>
Apache >= 2.4.35 <br>
MySQL >= 5.7.35 <br>

### Servidor Local

Laragon Full 4.0.16

#### Ativar Servidor

Execultado no terminal interno do Visual Studio Code

>>> php artisan serve

Localhost Gerado: http://127.0.0.1:8000

OBS: Seu Localhost pode ser diferente, ele será especificado, no terminal, após execução do comando acima.

### Cmder

CMDER nada mais é do que um “terminal” para o Windows, com essa ferramenta é possível rodar comandos UNIX (ls, rm, mv e etc) diretamente no Windows, e isso torna o trabalho no sistema operacional da Microsoft mais agradável (EspecializaTI, 2017).

#### Comandos usados para setar o projeto

Criando Projeto em "C:\laragon\www"

>>> composer create-project laravel/laravel lanchonete

Comando usado para criar documentação da autenticação padrão do Laravel

>>> composer require laravel/ui
>>> php artisan ui vue --auth

### Banco de Dados

Criei o *schema* laravel no MySQL Workbench e após criar os *models* e as *migrations* usei, o seguinte comando para criar as tabelas no meu banco de dados:

>>> php artisan migrate

Além disso, criei um usuário padrão usando a classe UsersTableSeeder, no qual eu passava um array com os valores dos campos da classe User já pré-definidos. Para setar tal registro no banco de dados usei o comando:

>>> php artisan db:seed

Após executá-lo suas credenciais serão as seguintes:
    
    *email:* admin@admin.com
    *senha: => 123456

## Descrição da Aplicação

### Página Inicial

Para acessar a página inicial é só digitar o Localhost no Browser (Microsoft Edge, Google Chrome, etc), como especificado no
item *Ativar Servidor*. Daí por diante o usuário pode tentar logar em *LOGIN ADMINISTRATIVO* ou tentar comprar um dos produtos 
caso, haja algum cadastrado no sistema. Caso haja produtos cadastrados no banco de dados serão renderizados na tela inicial.

#### LOGIN ADMINISTRATIVO

Ao acessar o *LOGIN ADMINISTRATIVO* o usuário será redirecionado para a autenticação padrão do Laravel, no qual, o login e senha são os criados pela classe UsersTableSeeder, como visto na seção *Banco de Dados*. Vale ressaltar que o usuário poderia criar um novo registro usando o *register* padrão do laravel, acessando ele pela URL, no entanto, essa funcionalidade seria facilmente desabilitada e até mesmo removida do site, porém, deixo, mesmo que sem link de acesso, acessível via URL, ficando a critério do próprio "testador" cadastar suas próprias informações.
Após logar, temos acesso ao Painel administrativo, sendo ele resposável, por dar link a um *CRUD* da Entidade Produto, uma lista de clientes e uma lista de pedidos. Em pedidos, o usuário administrador, pode facilmente, editar o status dos pedidos dos clientes, porém, não pode removê-los, editá-los ou criá-los.

OBS: Após Logar o usuáio administrador será redirecionado para uma página padrão do Laravel, na qual apresentará o _username_(nome de usuário) *Name User Admin*. Com isso é só retornar a tela inicial e verificará que o link *LOGIN ADMINISTRATIVO* foi substituído por *PAINEL ADMINISTRATIVO*, sendo possível acessar e gerenciar funcionalidaes de administrador do sistema.

#### LOGIN CLIENTE

O cliente, teoricamente, só deveria se cadastrar caso, um produto já tivesse cadastrado no sistema. Claro que se o usuário ao digitar a URL de cadastro de cliente poderá se cadastrar facilmente, tendo em vista que tal cadastro não usa o método de verificação de autenticação. Obviamente, é possível que um usuário numa situação remota possa cadastrar ou remover um pedido de um cliente, bastando usar apenas as URL com o parâmetro *ID* existente e/ou um usuário que já conhece e ver as URL e por método das tentativas consegue acessar um pedido referennte a um *ID* existente. Todavia, em tese, um cliente não ver os dados dos pedidos de outros clientes, isso não garante que eles não possam acessar.

OBS: Por se tratar de um sistema apenas para provas, não irei aprofundar em um método que possa impedir tal ação. Mas, usar um token e outros recursos poderia evitar, tal falha.

O cliente pode apenas cadastar (comprar), "ver", remover pedidos. Vale ressaltar que após sair da seção o cliente, só terá acesso a seus dados, se, e somente se, lembrar do seu *ID*, passando ele na URL, para acessar o painel de pedidos do cliente. Ou seja, ao sair o cliente, terá que fazer um novo cadastro com novas informações para poder ter acesso painel cliente.

Os campos *email* e *endereço* do cliente recebem o atributo *->unique();* nas mirations, sendo impossível inserir tais dados, caso existentes.

As demais validações foram criadas em JavaScript e com a classe Request do próprio Laravel.
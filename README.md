<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o Projeto

## Extensões utilizadas no VS Code

Aqui está a listagem das extensões que instalamos no VS Code durante o trabalho
com o framework Laravel.

• PHP Intelephense (Ben Mewburn)
• Laravel Snippets (Winnie Lin)
• Laravel Blade (amirmarmul)

Configurando a extensão do Laravel Blade

• Na página da extensão Laravel Blade, copiar o código de User Setting (as opções JSON).
• Depois, pressionar Ctrl+Shift+P para abrir a janela de comandos do VS Code.
• Selecionar Preferences: Open Settings (JSON)
• Colar o código copiado do Laravel Blade.

## Migrations

Quando trabalhamos com frameworks, é comum a utilização de migrations. Elas
são uma espécie de “planta baixa” do nosso banco de dados, ou seja, são as instruções
necessárias para a criação do banco e das tabelas.

A vantagem de utilizar migrations é que podemos “programar” a criação do banco
em vez de criar todo o código SQL na mão. Também faz com que criemos apenas uma
vez a construção do banco sem nos preocuparmos com o SGBD utilizado – um código
serve para todos (MySQL, SQL Server, Oracle, PostgreSQL etc.). Finalmente, também
permite criar “versões” do banco, que podem ser realizadas e desfeitas, conforme a
necessidade.

Para criar um arquivo de migration, utilizamos o seguinte comando (exemplo para
criação da tabela produtos e da tabela usuarios):

## php artisan make:migration create_produtos_table
## php artisan make:migration create_usuarios_table

Os arquivos de migration serão criados na pasta database/migrations. 
Basta acessar e alterar os campos necessários. Para acessar a lista de campos/colunas
disponíveis, basta ir à documentação: https://laravel.com/docs/8.x/migrations#availablecolumn-types
Para rodar as migrations e criar as tabelas, basta rodar:

## php artistan migrate

Caso queira desfazer o último step realizado de uma migration, basta rodar:

## php artisan migrate:rollback

## Rodando a aplicação Laravel depois de clonar

Quando buscamos a aplicação do Git, é preciso configurá-la para que rode
corretamente. Estes são os passos:

1. Clonar o repositório para a máquina local
• git clone <url_do_repositório> <nome_da_pasta>

2. Acessar pasta clonada
• cd <nome_da_pasta>

3. Rodar o instalador do composer, para puxar os arquivos complementares do Laravel
• composer install

4. Criar um arquivo chamado.env com base no .env.example
• cp .env.example .env

5. Gerar uma nova chave de aplicação
• php artisan key:generate

6. Abrir o arquivo .env no VS Code e alterar preferências, caso necessário
(informações de acesso a banco, timezone, diretório de log etc.)

7. Se houver migrations, é possível rodá-las agora
• php artisan migrate

8. Tudo pronto. Se quiser começar a rodar a aplicação, basta serví-la
• php artisan serve


## Laravel - Seeders

Conceitos básicos

Seeder é uma ferramenta que permite popular o banco de dados com dados iniciais
ou de teste de maneira fácil e automatizada. Essa funcionalidade é útil para
desenvolvedores que precisam popular seu banco de dados rapidamente durante o
desenvolvimento ou para garantir um conjunto de dados padrão para testes
automatizados.

Os Seeders são uma parte importante do processo de desenvolvimento, pois
permitem que você insira registros no banco de dados de maneira programática e
controlada. Isso pode ser útil em várias situações, como fornecer dados iniciais para sua
aplicação, gerar dados de teste para validar funcionalidades ou criar um ambiente
consistente para testes automatizados.

No nosso caso, em aula, servirá para que não tenhamos que ficar inserindo dados
no banco manualmente toda vez que precisarmos migrar de uma máquina para outra.

## Criando um seeder

O primeiro passo é criar o seeder, que é responsável por adicionar os dados no
banco. Para isso, podemos utilizar o comando php artisan make:seeder seguido
do nome do seeder que queremos criar. Por exemplo, para criar um seeder chamado
"EstoqueSeeder", podemos executar o seguinte comando:

## php artisan make:seeder EstoqueSeeder

## Registrando um seeder

Após criar o seeder, precisamos registrá-lo no arquivo "DatabaseSeeder.php", que
se encontra na pasta "database/seeders" de nossa aplicação. Para isso, devemos adicionar
uma chamada ao nosso seeder dentro do método run() deste arquivo, como no exemplo
abaixo:

public function run()
 {
 $this->call(
 EstoqueSeeder::class,
 );
 }
 
## Criando dados no seeder

Com o seeder registrado, podemos criar os dados que serão inseridos no banco de
dados. Para isso, devemos editar o arquivo do seeder que criamos, o
"EstoqueSeeder.php". Nele, podemos utilizar a classe "DB" para inserir os dados no
banco, como no exemplo abaixo:

DB::table('estoques')->insert([
 [
 'nome' => 'Bermuda',
 'quantidade' => 30,
 ],
 [
 'nome' => 'Camiseta',
 'quantidade' => 50,
 ],
]);

Podemos adicionar quantas linhas de inserção quisermos, com os dados que desejarmos.

## Rodando os seeders

Com o seeder criado, registrado e os dados inseridos, podemos finalmente rodar
os seeders. Para isso, utilizamos o comando php artisan db:seed. 

Este comando irá executar todos os seeders registrados no arquivo "DatabaseSeeder.php".

Caso queira zerar todo o banco de dados e rodar os seeders do zero, podemos
utilizar o comando php artisan migrate:fresh --seed. 
Este comando sempre pode ser utilizado na primeira vez em que o sistema está rodando na máquina, pois criará
as tabelas e já fará a inserção dos dados.

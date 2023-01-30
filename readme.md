## Teste Laravel

Aplicação desenvolvida em Laravel da versão 5.8 + PHP 7.2 + MySQL 5

## Instruções

### Clonando o projeto
```
git clone git@github.com:seuprojeto
```
### Acesse o projeto
```
cd seuprojeto
```
### Instale as dependências e o framework
composer install --no-scripts

### Copie o arquivo .env.example
```
cp .env.example .env
```

### Crie uma nova chave para a aplicação
```
php artisan key:generate
```
### Em seguida você deve configurar o arquivo .env e rodar as migrations com:
```
php artisan migrate --seed
```

Em relação ao npm:
```
npm install 
```
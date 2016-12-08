# Gerador de Landingpage

Gere sua landingpage através de área administrativa.

Crie templates de acordo com sua necessidade. 

Segue as opções que estão disponíveis para customizar:

- Seleção de cores primária, secundária e terciária através de código hexadecimal, onde essas cores são distribuida por todo o site, tendo o controle de todo o visual.

- Criação do menu, podendo adicionar textos e imagens em fontawesome.

- Criação de todo o conteúdo do site entre textos e imagens, divídos em 4 blocos.

Foi utilizado um tema no site em bootstrap, fazendo com que todo o site fique resposivo.


### Preparação do ambiente

instale o git
```sh
$ sudo apt-get install git
```
clone o projeto dentro de /var/www/ ou /var/www/html/
```sh
$ git clone https://github.com/jmessiass/gerador-landingpage.git
```
inicie o mysql
```sh
$ sudo mysql -u root -p
```
crie a base de dados
```sh
create database gerador_landingpage;
exit
```
importe as tabelas para o o mysql
```sh
$ sudo mysql -u root -p gerador_landingpage < gerador_landingpage.sql
```
acesse o admin pelo navegador
```sh
localhost/gerador-landingpage/admin/
```
usuário e senha padrão
```sh
admin 123456
```

## Boa sorte :) 

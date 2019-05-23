# Project HotelJay

### How to view the project
###### Before following the steps below make sure to have a valid working docker environment. And a lando installation

* pull master via github desktop or via ```git pull origin master```

* open terminal on folder / Navigate using CD

* ```composer i``` or ```composer install```

* ```lando init``` (the console will ask you to select some options, follow the options below)


> - current working directory 
> - laravel
> - public
> - projectjay


- Copy .env.example file and name it .env
- Replace the following lines with within the .env file:

```env
DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

- ```lando start```
- ```lando artisan key:generate```
- ```lando artisan config:cache```
- ```lando rebuild``` or ```lando stop``` then ```lando start```

# web-technology-project



## How to execute
Your system is required to have docker and docker-compose (or compatible alternatives).
To execute simply use

```sh
./develmode.sh
```
_**The script only works on Linux and MacOS**_

This script does the following:
- Generates `.env` file with random `DB_PASSWORD` and `APP_KEY`
- Starts services with docker compose
- Auto runs migrations


The webserver will then be available at:  
[http://127.0.0.1:8080](http://127.0.0.1:8080)

> [!NOTE]
> If you encounter a problem with the database connection,  
> try resetting the database. [See Reset Database below](#Reset-Database)


<br/><br/><br/><br/><br/>

## Do a seeding, using random data
```sh
sudo docker compose exec -it php php artisan db:seed
```
> Yes two times 'php'  
> the first refers to the container, and the second refers to the php command.


<br/><br/><br/><br/><br/>

## To Execute php commands in docker compose
> [!IMPORTANT] 
> Make sure the server is up and running, either in a separate terminal/tab or running in the background.

```sh
sudo docker compose exec -it php bash
```

You are now in a shell where you freely can use `php artisan` commands.  
E.g. to do a database migration, you can use:
```sh
php artisan db:seed
```


# Enter directly to database shell
```sh
sudo docker compose exec -it postgres psql -U laravel -d laravel
```

# Reset Database
To completely reset database you can run
```sh
sudo docker compose down -v
```
> [!WARNING]
> This will remove all data. Cannot be undone!

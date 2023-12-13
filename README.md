# web-technology-project



## How to execute
Your system is required to have docker and docker-compose (or compatible alternatives).
To execute simply use

```sh
./develmode.sh
```
This script automatically creates `.env` file with relevant values.  
Migrations are automatically run on startup.

**The script only works on Linux and MacOS**

The webserver will then be available at:  
[http://127.0.0.1:8080](http://127.0.0.1:8080)

> [!NOTE]
> If you encounter a problem with the database connection,  
> try reseting the database. [See Reset Database below](#Reset-Database)


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
> This will remove all data. Cannot be unddone!

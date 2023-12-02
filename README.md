# web-technology-project

## Setup env file
**TODO**

## How to execute
System is required to have docker and docker-compose (or compatible alternatives).
To execute simply use

```sh
sudo docker compose up
```

The webserver will then be available at:
[http://127.0.0.1:8080](http://127.0.0.1:8080)



## To Execute php commands in docker compose
> [!IMPORTANT]
> Make sure the server is up and running, either in a separate terminal/tab or running in the background.

```sh
sudo docker compose exec -it php bash
```

You are now in a shell where you freely can use `php artisan` commands.
E.g. to do a database migration, you can use:
```sh
php artisan migrate
```

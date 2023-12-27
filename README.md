# web-technology-project

## Two Factor Authentication Extension
This is an extension for our web technology project, which improves on the security significantly by
implementing Time based two factor authentication, known as TOTP.  
The implementation is written completely from scratch.  
This is however not ideal for production environments, but has rather been a
great learning experience.

### Resources
This extension would not have been possible without the following sources:
- [davidshimjs/qrcodejs](https://github.com/davidshimjs/qrcodejs/)
- [Google authenticator Uri Format wiki](https://github.com/google/google-authenticator/wiki/Key-Uri-Format)
- [RFC 4226 - HTOP based OTP](https://datatracker.ietf.org/doc/html/rfc4226)
- [RFC 6238 - TOTP based OTP](https://datatracker.ietf.org/doc/html/rfc6238)
- [Generating 2FA One-Time Passwords in JS Using Web Crypto API](https://dev.to/al_khovansky/generating-2fa-one-time-passwords-in-js-using-web-crypto-api-1hfo)
- [jakobo/hotp-php](https://github.com/jakobo/hotp-php/)


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

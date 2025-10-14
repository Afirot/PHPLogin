# PHPLogin

This is an login panel created in PHP to protect php apps.

### Requeriments

* mysql
* php
* webserver

## Deployment

First, you need to create a table in your database with the columns username, hash, userid.

You can also add another tables, like role, name, etc, but these three columns are the minimum to make the app work.

```mysql
CREATE TABLE users (
    userid CHAR(32)
    username VARCHAR(32),
    hash VARCHAR(100),
    PRIMARY KEY(userid)
);
```

Then, add your users.
I highly recommend creating an admin form to simplify this process, but you can also do it directly with an SQL query:

```mysql
INSERT INTO users (userid, username, hash)
VALUES ('<userid>', '<username>', '<hashedPassword');
```
(Make sure <hashedPassword> is strongly hashed, NEVER plain text or a weak hash like MD5.)

## Configuration

Update your database credentials in the application.
You’ll find them in login.php, main.php, and any other protected pages.

I recomend to use a .env here.

```php
$conexion = db_conection('<db_host>', '<db_user>', "<db_password>", '<db_table>');
```
## Usage

Write your application normally.

An example of a protected page (main.php) is included.
Make sure that every page you want to protect follows the same structure as ```main.php```, including the authentication check at the beginning of the file.

Also, login.php, will redirect you automaticaly to main.php when you are logged, if you want to change that, you can change the line 24 in ```login.php```.

```php
header('location: home.php');
```

# Project Store Website
This is the project repository for a computer parts store for a database class in college. 
The website uses an SQL database to store user, employee, and stock information. 
I created the entire website, the MySQL database, and the self-hosted infrastructure that it currently runs on at https://store.thadsander.com/.




## How to Set up in Docker-Compose

`git clone https://github.com/DevelopingHippo/store-website.git && cd store-website`
<br>

Make sure you change the default passwords in the docker-compose.yml file for the MySQL server to something more secure, 
as well as changing the connection info in /store-website/web/www/php/databaseFunctions.php to use the new password

<br>

#### /store-website/docker-compose.yml
```yaml
  db_store:
    container_name: db_store
    image: mysql
    command: --default-authentication-plugin=mysql_native_password
    environment:
      MYSQL_ROOT_PASSWORD: changeme
      MYSQL_DATABASE: store
      MYSQL_USER: web
      MYSQL_PASSWORD: changeme2
    volumes:
      - "./database/data:/var/lib/mysql"
      - "./database/schema.sql:/docker-entrypoint-initdb.d/1.sql"
      - "./database/data.sql:/docker-entrypoint-initdb.d/2.sql"
    ports:
      - "9906:3306"
    networks:
      - store
    restart: always
```
<br>

#### /store/web/www/php/databaseFunctions.php
```php
function queryDatabase($sql)
{
    $conn = mysqli_connect("db_store","web","changeme2", "store");
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

# Sanitize input before being added to SQL query
function inputSanitize($input): string
{
    $conn = new mysqli("db_store","web","changeme2", "store");
    return mysqli_real_escape_string($conn, $input);
}
```
`docker-compose up -d --force-recreate`

### SSL Certificates
Rename your .pem and .key file to store.pem and store.key and move them into the /store-website/web/config/certs/ directory

## Getting Started
There are two accounts created by default

| Account Type  | Username    | Password |
|---------------|-------------|----------|
| Administrator | admin       | admin    |
| Customer      | exampleUser | password |
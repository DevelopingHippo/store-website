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

`docker-compose up -d --force-recreate`

### SSL Certificates
Rename your .pem and .key file to store.pem and store.key and move them into the /store-website/web/config/certs/ directory

## Getting Started
There are two accounts created by default

| Account Type  | Username    | Password |
|---------------|-------------|----------|
| Administrator | admin       | admin    |
| Customer      | exampleUser | password |
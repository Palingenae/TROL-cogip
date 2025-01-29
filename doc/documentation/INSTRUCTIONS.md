# Project instructions

This project uses different technologies and use different ports. Make sure they are all free on your computer:

- 3306 for mysql in `./app/api`
- 80 for php / nginx in `./app/api`
- none for node container in `./app/webapp`

## 1. Installing the project

First of all, clone this repository in your preferred project folder:
```shell
$ git clone git@github.com:Palingenae/TROL-cogip.git <destination-folder-name>
```

### 1.1. The API with Docker
Docker has been used for this project's environment, thus, if you use Docker in your everyday workflow, it should be easy to install it although there aren't any Makefile.

#### 1.1.1. The `.env` file 

This file is not commited. Create a `.env` file by using `cp -n .env.dist .env` with your terminal. 

```env
MYSQL_USER=olivia #Or the name of your choice
MYSQL_PASSWORD=password
MYSQL_DATABASE=cogip
MYSQL_ROOT_PASSWORD=root #required by Docker to run
```

#### 1.1.2. Launch Docker for the first time

Apply those commands in your terminal :
   
##### 1.1.2.1. Launch containers
```
docker-compose build && docker-compose up -d
```

This command will run the build of the container PHP and then run all containers in this project.

> [!NOTE]  
> If you are using Docker in Powershell (Windows), you will need to replace `&&` with `;`

##### 1.1.2.2. Install PHP bundles

In `./app/api`, you will need to run this command for Symfony to work:

```
docker-compose exec php composer install
```

##### 1.1.2.3. **Create database tables**.
Database is already created if it's not already done.

> [!IMPORTANT]  
> You might need to run a SQL to make sure your user from the `db` container can run commands, and grants necessary privileges. You can do so with the root user connecting to that container with `docker-compose exec db -u root -p`. 
> 
> It will ask your root password (see 1.1.1)

In Docker, you can directly use containers' terminal. To do so, you can use this command from your Operating-System terminal:
```
$ docker-compose exec php exec bash
```

From there, you can execute the next three commands:

**Migrate**:
```
$ bin/console doctrine:migration:migrate
```

**Create fixtures**:
```
$ bin/console doctrine:fixtures:load
```

**In case of doubt, feel free to use**
```
$ bin/console list
```

It is also important to note that there is a Makefile at the root of the project. In there, you can find commands such as
```
$ make dev
```

You can use `make help` to list the available commands.

### 1.2. The API without docker
Symfony is agnostic, so you can install directly on a machine in order to develop using the framework, using XAMPP/LAMP/MAMP/WAMP.

It will rely on your local NGINX or NGINX installation.

- `./app/api` folder contains Symfony. It will be accessible at [localhost]("http://localhost/app/api").
- `./app/webapp` folder contains the VueJS web app. With `npm run dev` it will be accessible on [localhost:5173]("http://localhost:5173")

Select all `./app/api` content (it is advised to copy-paste the content), and move / paste in the adequate folders. There might be a need to proceed to some configuration. For instance, database and mails.

Check database URL in `app/.env`.
For emails, you can use (Mailgun)[https://www.mailgun.com/]. It relies on APIs. You could either use your domain address with a DNS MX entry from your registrar or Gmail.

### 1.3 The web app

The web app does not rely on Docker, so running those commands, while in the folder `./app/webapp` is enough so start development on your machine:

```shell
$ npm install
$ npm run dev
```
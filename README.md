# ECO IT - Des formations pour la planète

## A Full stack exercise for certification

A web site using:

- [Symfony](https://symfony.com/) v6
- [Bootstrap](https://getbootstrap.com/) v5.0

## Application content

This website contains 4 pages:

- Accueil
- Formations
- A propos
- A Connection for member'area. Also a login page to subscribe

### The origin of the project

This website is an certification appliance. It'a made in order to improve all the acknownleges in how to built a full stack project. There were two subjects in range. One reguard an Hotel and the second one for a formation center. We choose the second one. ECO it is the name.

To start installing the project's dependencies by running:

1. Donwload the repository code throw the green button on top and run the command below to setup the developpement dependencies

```shell
composer install
```

2. Install the dependencies of the project.

```shell
npm install
```

3. You should have [Apache](https://httpd.apache.org/) and [MySQL](https://www.mysql.com/fr/downloads/) or some database maanager installed on your machine. The easiest way is the install et run [PhpMyAdmin](https://www.phpmyadmin.net/). Download [Xampp](https://www.apachefriends.org/fr/index.html)

4. Access the .env file to update the database informations.

5. Lunch the webpack build sequences

```shell
npm run dev
```

6. Finally, you can run your project locally with:

```shell
symfony serve
```

In the browser : <http://localhost:8000>, to see the running project !

## Website configuration

The config is based on environment variables to make it easy to integrate with any Jamstack platform, like Netlify.

Here are the variables you can edit:
| Variable | Description | Options
| --- | --- | --- |
| `ENV_DEV` | If you want to edit something ||

All of the env variables can be configured.

Thanks for looking at this project !

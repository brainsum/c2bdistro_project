# c2bdistro - Composer template

Composer template to kickstart C2 projects.

This template was based on the following:

- [Drupal composer project](https://github.com/drupal-composer/drupal-project)
- [Drupal recommended project](https://www.drupal.org/docs/develop/using-composer/starting-a-site-using-drupal-composer-project-templates)
- [Thunder distro](https://github.com/thunder/thunder-project).

## Installation

Note: These commands have been tested on linux (ubuntu), they might need changes to work on other systems.
Note: In the host needs to be composer and min requirement for docker-compose version is 1.27.4.

### Native composer

For the latest release:
```shell script
composer create-project brainsum/c2bdistro-project my-c2bdistro-project
```

For a dev release:
```shell script
composer create-project brainsum/c2bdistro-project --stability=dev my-c2bdistro-project
```

## Setup

### App

Drupal itself is in the `app` folder, you need to use `composer install` there, too.
Note, when using the supplied docker stack, on `app` is mounted in the container.

### Environment variables

By default, the project depends on some environment variables. See the [settings.php scaffold file](./composer/c2bdistro/assets/default.settings.php) as well the files in the [settings folder](./settings).

### (Optional) Docker-compose

If you want to use docker-compose for development, you should copy `example.env` as `.env`, e.g `cp example.env .env`. Update its contents as required.

For starting and stopping the environment you can use the helper scripts provided with the project (`startup.sh` and `shutdown.sh`). These also look for a `docker-compose.local.yml` file so you can version control a generic config file and do local overrides (e.g ports, mounts).

### Drush

To be able to make a db backup:
Copy `app/drush/local/example.drush.yml` as `app/drush/local/drush.yml`. Update its contents as required.

### Filesystem permission fixes

E.g. on linux, you must fix file and directory permissions as well, e.g for "private_files", "web/sites/default/files", "tmp", ...

### Install

Use `drush site-install --account-pass=somestrongpass --site-mail=mail@currentsite.com --site-name=c2bdistro c2bdistro -y`

You also might want to add `--account-name` and `--account-mail`.

## Usage
### Main site

Upload your assets and that's it. You can download them, images can be styled for social media purposes, logo can be added, etc.

### API

The JSON:API module has been enabled, so you can serve your assets through that. An example would be using the [FileField Sources JSON API
](https://www.drupal.org/project/filefield_sources_jsonapi) module that allows you to configure file fields to allow downloading files from c2bdistro directly via the API.

## Development

For development info see the [DEVELOPMENT.md](./DEVELOPMENT.md) file.

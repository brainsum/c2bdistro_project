# Local development with DDEV

Because all required DDEV configuration files are already included in the
project, you can start using DDEV right away.

## Basic DDEV commands

### Start DDEV

```shell script
ddev start
```

### Stop DDEV

```shell script
ddev stop
```

### Reload DDEV

```shell script
ddev restart
```

### Open the project in the browser

```shell script
ddev launch
```

## Installation

## First start

### 1. Start DDEV

```shell script
ddev start
```

### 2. Run `composer install`

```shell script
ddev composer install
```

### 3. Import DB dump

```shell script
ddev import-db --file=path-to-database.dump.gz
```

### 4. Run for the first time the grumphp git:init command

```shell script
ddev exec grumphp git:init
```

### 5. Open the project in the browser

```shell script
ddev launch
```

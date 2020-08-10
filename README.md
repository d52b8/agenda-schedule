# agenda-schedule

## About

Simple Agenda Schedule

## How to install?

``` shell
composer require "d52b8/agenda-schedule"
```

## How to use?

``` php
<?php
require './vendor/autoload.php';

use d52b8\agenda\Schedule;

$config = [
    'name' => 'name',
    'data' => [
        'task' => 'task'
    ]
];
$schedule = new Schedule($config);
$schedule->setPriority(Schedule::PRIORITY_HIGH);
```

## How to test?

* Run

``` shell
composer test
```

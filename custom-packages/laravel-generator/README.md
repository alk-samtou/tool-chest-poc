# Laravel Generator

Quickly scaffold different types of files

## Installation

```
composer require metasismedia/laravel-generator
```

## Features

* Controllers - Creates CRUD based controller using service.
* Events - Creates event file for create, update  & delete actions & passes payload
* Model - Creates model file
* Migration - Creates migration with no schema defined
* Requests - Generates classes with empty rules
    * Create
    * Update
    * Delete
* Routes - Creates resource URLs
    * API
    * Frontend
* Factory - Generates empty class
* Seeder - Generates empty class
* Service - Generates empty class
* Unit Test - Generates test against service
* Views - Generates empty starter files
    * Index
    * Create
    * Read
    * Update
    * Delete

## Configuration

Publish the configuration. This step is required to copy stubs used to generate your crud. Once published you can edit them as needed.

```
php artisan vendor:publish --provider="MetasisMedia\LaravelGenerator\ServiceProvider"
```

## Usage

Once you have published the configuration, run the below command

```
php artisan generator:make ResourceName  (Singular)

php artisan generator:destroy ResourceName (Singular) - will remove generated files if they exist.
```

## Get Going

- Migration
    - setup schema
- Model
    - define fillable
    - define relationships
- Factory & Seeder
    - set model & definition in factory
    - add factory create to seeder
- Request Rules
    - define rules
- Build out views

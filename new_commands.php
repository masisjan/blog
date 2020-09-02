<?php

/*
 ************* Lesson 1 commands ****************
 ********** working with migrations *************
 * mysql -uroot -p -e "CREATE DATABASE laravel_pro"
 * php artisan migrate:install
 * php artisan migrate
 * php artisan make:migration create_companies_table
 * php artisan migrate:rollback
 * php artisan migrate:fresh --seed
 *
 *
 *********** Seeding database table *************
 * php artisan make:seeder CompaniesTableSeeder
 * php artisan db:seed --class=CompaniesTableSeeder
 * php artisan db:seed
 *
 *
 **************** Eloquent *******************
 * php artisan make:model Company
 * php artisan tinker
 * php artisan make:model Contact -m
 *
 *
 ************ Model Factories ****************
 * php artisan make:factory ContactFactory -m Contact
 * composer dump-autoload
 *
 *
 ************ Route commands ****************
 * php artisan route:list
 * php artisan route:list -c
 * php artisan route:list --path=contacts
 * php artisan route:list --path=contacts -r
 * php artisan route:list --path=contacts -h
 *
 *
 ************ Controllers ****************
 * php artisan make:controller ContactController
 *
 *
 * test

************ Generate pagination view file ****************
 * php artisan vendor:publish
*
 **/

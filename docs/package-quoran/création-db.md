# Création de la base de données 


## Création des tables 

````bash
php artisan make:migration create_roots_table
php artisan make:migration create_surahs_table
php artisan make:migration create_ayahs_table
php artisan make:migration create_words_table
php artisan make:migration create_ayahs_table

php artisan make:migration create_topics_table
php artisan make:migration create_topicCategories_table
php artisan make:migration create_noteAyat_table

php artisan migrate:fresh
````

## Création des model

````bash
php artisan make:model  Root
````


## Création des jeux de test 

````
php artisan make:seeder surahs
````
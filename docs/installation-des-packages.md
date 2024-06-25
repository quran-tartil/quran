# Installation des packages

## Laravel Spatie

```bash
composer require spatie/laravel-permission
```

Ajoutez le fournisseur de services dans votre fichier `config/app.php` dans `'providers'`:

```bash
Spatie\Permission\PermissionServiceProvider::class,
```

[LARAVEL-PERMISSION - Installation in Laravel](https://spatie.be/docs/laravel-permission/v6/installation-laravel)


--------------

1. **Lang Localization**

Installation du package 

   ```php
   php artisan lang:publish
   ```

- Allez dans `config/app.php`, 
  - changez `'fallback_locale' => 'en'`, en `'fallback_locale' => 'fr'`,
  - et `'locale' => 'en'` en `'locale' => 'fr'`,
  - et `'fallback_locale' => 'en'`, en `'fallback_locale' => 'fr'`,
  - et `'faker_locale' => 'en_EN'`, en `'faker_locale' => 'fr_FR'`,

  
   [Documentation Laravel - Localisation](https://laravel.com/docs/11.x/localization#main-content)
   

1. **maatwebsite/excel**

Installation du package 

   ```bash
   composer require maatwebsite/excel:^3.1
   ```

- Ensuite, allez dans `composer.json` et mettez à jour `"maatwebsite/excel": "*"` en `"maatwebsite/excel": "3.1.48"`
- Exécutez cette commande

   ```bash
   composer update
   ```

- Exécutez cette commande `php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config`

[Documentation Laravel Excel - Installation](https://docs.laravel-excel.com/3.1/getting-started/installation.html)

1. **ckeditor5**
Installation du package

   ```bash
   npm install --save @ckeditor/ckeditor5-build-classic
   ```

Ajoutez ce JavaScript dans `app.js`

```js
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

ClassicEditor
   .create( document.querySelector( '#editor' ) )
   .then( editor => {
   window.editor = editor;
} )
.catch( error => {
   console.error( 'Il y a eu un problème lors de l\'initialisation de l\'éditeur.', error );
} );
   ```

[Documentation Laravel Excel - Installation](https://www.npmjs.com/package/@ckeditor/ckeditor5-build-classic)




1. **jquery**

Installation du package 

   ```php
   npm install jquery@3.6.0 --save-dev
   ```

[Documentation jquery](https://www.npmjs.com/package/jquery)

1. **Font Awsome Icons**

Installation du package 

   ```php
   npm i @fortawesome/fontawesome-free
   ```

[Documentation Font Awsome Icons](https://github.com/FortAwesome/Font-Awesome#documentation)


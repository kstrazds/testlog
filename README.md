# TEST | LOGIN / REGISTRATION

## Project setup
```
npm install
composer install
```
Database import which is accessable in project root.

### Mailgun for mail services
Created free .tk domain. 
Added DNS configuration.
Verified DNS with Mailgun to use API.
Used mailgun code for email sending - added necessary parameters.

## Frontend
### jQuery
Used jQuery as I felt more comfortable with it.

### Sass
Used sass as I found it most appropriate for the styling.

### Design
For images output used Adobe Illustrator, images were optimized as much as could for better load speed. Design was created without calculating (checking) each block's size and distance between them, instead tried to stick with 8px grid standard.

### Minify js using uglify
```
uglifyjs <filepath> --output <output path>.min.js
```
### Gulp sass
```
gulp sass
```

### Gulp minified css
```
gulp minicss
```

## Backend
Used plain PHP and tried to stick with Model/View/Controller pattern as the Router is created like for single page app.
Most of the validation comes from the backend, but only on Sign Up used error messages where i used ajax in js. 

## XAMPP
Used xampp for the Apache and MySQL, PHP 7.2.31.

## Git, Visual Studio Code
Used git bash terminal and the Visual Studio Code editor. Tried to add commits and do regular pushing for visibility.

## Summary
Eventually, tried to minify and optimize everything. Tried to structurize the files and make the code clean to be more dev friendly for better readability.
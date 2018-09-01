# zyte
> A lightweight application that parses and builds a Javascript based web application with a limited file size. 

### How to use PHP parser:

- you need the following files in a relative directory with __zyte.php__

- __zyte.config__ - configuration file
- __main.html__ - html, head, meta settings, body go here.
- __app.css__ - all the CSS for the web app
- __app.js__ - all Javascript for the web app

> #### zyte.config
```json
project-name: Sample App;
entry-point: index.html;
size: 8000;
src: src;
compile-type: js;
```
> compile types, __js__ allows all the html and css to be rendered in Javascript
> while __html__ just allows you to compress everything in a single html file.

### Project status:
- PHP Parser complete, 
- Python script compiler, still a work in progress 

# pmPDFKitPlugin

The `pmPDFKitPlugin` plugin is a clone on jdpace's PDFKit library for Ruby (and
Ruby on Rails). It allows you to export any page as PDF only adding the pdf
format to the request. IE: calling http://example.com/post/1.pdf

## Requirements

wkhtmltopdf library is required. You can download it from [wkhtmltopdf on Google code](http://code.google.com/p/wkhtmltopdf/).

## Installation

* Via composer:

```json
{
  "require": {
    "desarrollo-cespi/pm-p-d-f-kit-plugin": "dev-master"
  }
}
```

* Or using git, from source.

* Enable the plugin in the project configuration:

```php
// in config/ProjectConfiguration.class.php add:
$this->enablePlugin('pmPDFKitPlugin');
```

## Usage

* Enable the pmPDFKitFilter
  
```yml
pm_pdfkit:
  class: pmPDFKitFilter
```
  
* By default, this plugin expects the wkhtmltopdf executable to be in /usr/local/bin/wkhtmltopdf. If it does not you can specify it in app.yml:
  
```yml
all:
  pm_pdf_kit:
    executable: /home/patricio/bin/wkhtmltopdf
```
    
* Clear the cache
  
* Finally, try to access any resource appending the .pdf format.

## Advanced usage

* Edit the default routes so any page can be transformed as pdf:
  
```yml
default_index:
  url:   /:module.:sf_format
  param: { action: index, sf_format: html }

default:
  url:   /:module/:action.:sf_format/*
  param: { sf_format: html }
```

* You can save any view to a file (instead of inline view in the browser) using the pmPDFKit class.
  
* Specify extra parameters for wkhtmltopdf appending them to the url:
  
```bash
http://somedomain.com/something/1.pdf?orientation=landscape&page-size=Letter&print-media-type=true
```
    
See all options executing `wkhtmltopdf -H` in the terminal.

## TODO

* fix images paths (because images are loaded from the stylesheets).

## CMS Master Laravel 5.8

php 7.2 minimo

<h3>Third Party</h3>
<p>Este proyecto necesita de las siguientes API para funcionar correctamente</p>
<ol>
  <li>Calendar links for events  (https://github.com/spatie/calendar-links)</li>

</ol>

## Install

```
composer update
php artisan migrate
php artisan db:seed
php artisan storage:link
cp .env.example .env; php artisan key:generate
```

Agregar en el .env accesos google reCAPTCHA

```
NOCAPTCHA_SECRET= Clave_secreta
NOCAPTCHA_SITEKEY= Clave_del_sitio
```

configurar app_url para el funcionamiento de sitemap en .env

```
APP_URL=https://dominio.test:8443
```

-   configurar mailgun para correos

_configuracion solo para producción_

-   configurar CRON para sitemap en cpanel, crear cron en cpanel usando la ruta correcta

```
* * * * *	cd /home/usuario-de-cpanel/public_html && ea-php72 -d memory_limit=-1 artisan schedule:run >> /dev/null 2>&1
```

## SEO

#### Configurar seo por defecto

_agregar funcion a la vista master_

```
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
<!-- OR -->
{!! SEO::generate() !!}
```

_configuraciones adiconales en el arhivo config/seotools.php_

```
SEO_DESCRIPTION="Descripcion por defecto para el sitio web"
```

#### Uso en el controlador

```
SEOMeta::setTitle($post->title);
SEOMeta::setDescription($post->resume);
SEOMeta::addMeta('article:published_time', $post->published_date->toW3CString(), 'property');
SEOMeta::addMeta('article:section', $post->category, 'property');
SEOMeta::addKeyword(['key1', 'key2', 'key3']);
```

[Mas información](https://github.com/artesaos/seotools)

## Roles creados

-   Administrator
-   Editor

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

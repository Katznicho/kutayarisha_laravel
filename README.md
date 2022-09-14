RewriteEngine On
RewriteCond %{HTTP_HOST} !^www\.
RewriteRule ^(.*)$ http://www.%{HTTP_HOST}/$1 [R=301,L]

DB_DATABASE=manipalh_manipalhospital
DB_USERNAME=manipalh_manipalh
DB_PASSWORD=jiGoe7nyadXR

<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule ^(.*)$ public/$1 [L]
</IfModule>


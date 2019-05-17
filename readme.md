# Cloudflare IP Laravel

If you use Cloudflare, this will set `$_SERVER['REMOTE_ADDR']` to `$_SERVER['HTTP_CF_CONNECTING_IP']` if it's set.

## Install

Using Composer

```bash
$ composer require taylornetwork/cloudflare-ip-laravel
```

And then run 

```bash 
$ php artisan cf:install
```

## Manually

You don't even need to install this package if you'd rather just edit your `public/index.php` yourself.

Just add the following after `$app = require_once __DIR__.'/../bootstrap/app.php';`

```php
if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
}
```

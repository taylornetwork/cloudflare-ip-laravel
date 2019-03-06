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


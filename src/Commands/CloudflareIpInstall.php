<?php

namespace TaylorNetwork\CloudflareIP\Commands;

use Illuminate\Console\Command;

class CloudflareIpInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cfip:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Cloudflare IP Corrector';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        copy(__DIR__.'/../cloudflare-ip.php', base_path('bootstrap/cloudflare-ip.php'));
        copy(base_path('public/index.php'), base_path('public/index.php.backup'));

        $file = explode(PHP_EOL, file_get_contents(base_path('public/index.php')));
        $line = array_search("\$app = require_once __DIR__.'/../bootstrap/app.php';", $file);
        $firstHalf = array_slice($file, 0, $line+1);
        array_push($firstHalf, '');
        array_push($firstHalf, "require_once __DIR__.'/../bootstrap/cloudflare-ip.php';");
        file_put_contents(base_path('public/index.php'), implode(PHP_EOL, array_merge($firstHalf, array_slice($file, $line+1))));
    }
}

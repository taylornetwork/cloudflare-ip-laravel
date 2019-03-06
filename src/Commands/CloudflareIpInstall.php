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
    protected $signature = 'cf:install';

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
        $this->line('Warning! This will modify your index.php file.');
        $this->line('The following line will be added...');
        $this->info("require_once __DIR__.'/../bootstrap/cloudflare-ip.php';");

        if($this->confirm('Are you sure you want to continue? (yes/no)')) {

            $this->info('Copying cloudflare-ip.php to bootstrap...');
            copy(__DIR__.'/../cloudflare-ip.php', base_path('bootstrap/cloudflare-ip.php'));

            $this->info('Backing up index.php...');
            copy(base_path('public/index.php'), base_path('public/index.php.backup'));

            $this->info('Adding line to index.php...');
            $file = explode(PHP_EOL, file_get_contents(base_path('public/index.php')));
            $line = array_search("\$app = require_once __DIR__.'/../bootstrap/app.php';", $file);
            $firstHalf = array_slice($file, 0, $line+1);
            array_push($firstHalf, '');
            array_push($firstHalf, "require_once __DIR__.'/../bootstrap/cloudflare-ip.php';");
            file_put_contents(base_path('public/index.php'), implode(PHP_EOL, array_merge($firstHalf, array_slice($file, $line+1))));

            $this->info('Done.');
        }
        
    }
}

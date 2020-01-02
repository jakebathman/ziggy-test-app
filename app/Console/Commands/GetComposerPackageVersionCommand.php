<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetComposerPackageVersionCommand extends Command
{
    protected $signature = 'composer:info {package}';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $package = $this->argument('package');

        $output = shell_exec("cd ..;composer info $package 2>&1");

        $match = preg_match('/versions\s?:\s*(.*)/i', $output, $versions);

        if ($match) {
            $this->line($versions[1]);
        } else {
            $this->line('unknown');
        }
    }
}

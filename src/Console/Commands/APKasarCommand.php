<?php namespace Bantenprov\APKasar\Console\Commands;

use Illuminate\Console\Command;

/**
 * The APKasarCommand class.
 *
 * @package Bantenprov\APKasar
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class APKasarCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:ap-kasar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\APKasar package';

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
        $this->info('Welcome to command for Bantenprov\APKasar package');
    }
}

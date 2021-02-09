<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRepositoryInterface extends Command
{
    protected $name = 'make:MakeRepositoryInterface';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:MakeRepositoryInterface {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command is used to make traits';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'interface';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    /**public function __construct()
    {
        parent::__construct();
    }*/

    /**
     * Execute the console command.
     *
     * @return int
     */
    /**public function handle()
    {
        return 0;
    }*/

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/Stubs/trait.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        //dd($rootNamespace);
        return $rootNamespace . '\Traits';
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;

class ManagerMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     */
    protected $name = 'make:manager {name}';

    /**
     * The console command description.
     */
    protected $description = 'Create a new repository manager';

    /**
     * The type of class being generated.
     */
    protected $type = 'Manager';

    /**
     * The namespace of the class being generated.
     */
    protected string $managerNamespace;

    /**
     * The name of class being generated.
     */
    private string $managerClass;

    /**
     * Execute the console command.
     *
     * @throws FileNotFoundException
     */
    #[NoReturn] public function handle(): ?bool
    {
        $this->setManagerClass();

        $path = $this->getPath($this->managerNamespace . '\\' . $this->managerClass);

        if ($this->alreadyExists($this->getNameInput())) {
            $this->error($this->type . ' already exists!');

            return false;
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->buildClass($this->managerClass));

        $this->info($this->type . ' created successfully.');

        $this->line("<info>Created Manager :</info> $this->managerClass");

        return true;
    }

    /**
     * Set manager class name
     *
     * @return  void
     */
    #[NoReturn] private function setManagerClass(): void
    {
        $name                   = ucwords(strtolower($this->argument('name')));
        $this->managerNamespace = $this->getDefaultNamespace(rtrim($this->rootNamespace(), '\\'));
        $this->managerClass     = $name . 'Manager';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Managers';
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param string $stub
     * @param string $name
     * @return string
     */
    #[NoReturn] protected function replaceClass($stub, $name): string
    {
        if (!$this->argument('name')) {
            throw new InvalidArgumentException("Missing required argument model name");
        }

        $stub = parent::replaceClass($stub, $name);
        $stub = str_replace('DummyVarduSritis', $this->managerNamespace ?? 'ERROR', $stub);
        $stub = str_replace('DummyRepository', ucwords(strtolower($this->argument('name'))) . 'Repository', $stub);

        return str_replace('DummyClass', ucwords(strtolower($this->argument('name'))), $stub);
    }

    /**
     *
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return base_path('stubs/Manager.stub');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model class.'],
        ];
    }
}

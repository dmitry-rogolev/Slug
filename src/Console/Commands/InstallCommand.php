<?php

namespace dmitryrogolev\Slug\Console\Commands;

use Illuminate\Console\Command;

/**
 * Команда установки пакета "Slug", предоставляющего функционал slug'а.
 */
class InstallCommand extends Command
{
    /**
     * Имя и сигнатура консольной команды.
     *
     * @var string
     */
    protected $signature = 'slug:install 
                                {--config}';

    /**
     * Описание консольной команды.
     *
     * @var string
     */
    protected $description = 'Installs the "Slug" package that provides slug functionality for the Laravel framework.';

    /**
     * Выполнить консольную команду.
     *
     * @return mixed
     */
    public function handle()
    {
        $tag = 'slug';

        if ($this->option('config')) {
            $tag .= '-config';
        }

        $this->call('vendor:publish', [
            '--tag' => $tag,
        ]);
    }
}
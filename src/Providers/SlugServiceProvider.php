<?php

namespace dmitryrogolev\Slug\Providers;

use dmitryrogolev\Slug\Console\Commands\InstallCommand;
use dmitryrogolev\Slug\Services\Service;
use Illuminate\Support\ServiceProvider;

/**
 * Поставщик функционала slug'а для моделей.
 */
class SlugServiceProvider extends ServiceProvider
{
    /**
     * Имя тега пакета.
     *
     * @var string
     */
    private string $packageTag = 'slug';

    /**
     * Регистрация любых служб пакета.
     * 
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfig();
        $this->publishFiles();
        $this->registerCommands();
        $this->registerServices();
    }

    /**
     * Загрузка любых служб пакета.
     * 
     * @return void
     */
    public function boot(): void
    {

    }

    /**
     * Объединяем конфигурацию пакета с конфигурацией приложения.
     *
     * @return void
     */
    private function mergeConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/slug.php', 'slug');
    }

    /**
     * Публикуем файлы пакета.
     *
     * @return void
     */
    private function publishFiles(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/slug.php' => config_path('slug.php'),
        ], $this->packageTag . '-config');

        $this->publishes([
            __DIR__ . '/../../config/slug.php' => config_path('slug.php'),
        ], $this->packageTag);
    }

    /**
     * Регистрируем команды.
     *
     * @return void
     */
    private function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    /**
     * Регистрируем сервисы.
     *
     * @return void
     */
    private function registerServices(): void
    {
        $this->app->singleton(Service::class);
        $this->app->alias(Service::class, 'slug');
    }
}

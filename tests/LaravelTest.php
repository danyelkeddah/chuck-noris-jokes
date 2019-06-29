<?php
namespace DanyelKeddah\ChuckNorrisJokes;

use Orchestra\Testbench\TestCase;
use DanyelKeddah\ChuckNorrisJokes\Console\ChuckNorrisJokes;
use Illuminate\Support\Facades\Artisan;
use DanyelKeddah\ChuckNorrisJokes\Facades\ChuckNorris;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ChuckNorrisJokesServiceProvider::class
        ];
    }
    
    protected function getPackageAliases($app)
    {
        return [
            'ChuckNorris' => ChuckNorrisJokes::class
        ];
    }
    
    /** @test */
    public function the_console_command_returns_a_joke()
    {
        $this->withoutMockingConsoleOutput();
        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');
            
        $this->artisan('chuck-norris');
        
        $output = Artisan::output();
        
        $this->assertSame('some joke'.PHP_EOL, $output);
    }
    
    /** @test */
    public function the_route_can_be_accessed()
    {
        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');
        
        $this->get('/chuck-norris')
            ->assertViewIs('chuck-norris::joke')
            ->assertViewHas('joke', 'some joke')
            ->assertStatus(200);
    }
}

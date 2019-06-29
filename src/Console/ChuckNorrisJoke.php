<?php
namespace DanyelKeddah\ChuckNorrisJokes\Console;

use Illuminate\Console\Command;
use DanyelKeddah\ChuckNorrisJokes\Facades\ChuckNorris;

class ChuckNorrisJoke extends Command
{
    protected $signature = 'chuck-norris';
    protected $description = 'Outpout a funny Chuck Norris Joke.';

    public function handle()
    {
        $this->info(ChuckNorris::getRandomJoke());
    }
}

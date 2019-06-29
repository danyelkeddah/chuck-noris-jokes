<?php
namespace danyelkeddah\ChuckNorrisJokes\Tests;

use PHPUnit\Framework\TestCase;
use danyelkeddah\ChuckNorrisJokes\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_random_joke()
    {
        $jokes = new JokeFactory([
            'This is a joke'
        ]);

        $joke = $jokes->getRandomJoke();
        $this->assertSame('This is a joke', $joke);
    }

    /** @test */
    public function it_returns_predefined_joke()
    {
        $chukcNorrisJokes = [
            'Chuck Norris\' tears cure cancer. Too bad he has never cried.',
            'Chuck Norris counted to infinity... Twice.',
            'If you can see Chuck Norris, he can see you. If you can\'t see Chuck Norris you may be only seconds away from death.'
        ];
        $jokes = new JokeFactory();
        $joke = $jokes->getRandomJoke();
        $this->assertContains($joke, $chukcNorrisJokes);
    }
}

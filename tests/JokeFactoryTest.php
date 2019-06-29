<?php
namespace DanyelKeddah\ChuckNorrisJokes\Tests;

use PHPUnit\Framework\TestCase;
use DanyelKeddah\ChuckNorrisJokes\JokeFactory;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Handler\MockHandler;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_random_joke()
    {
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 619, "joke": "Chuck Norris can lock a safe and keep the key inside it.", "categories": [] } }')
        ]);
        
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $jokes = new JokeFactory($client);

        $joke = $jokes->getRandomJoke();
        $this->assertSame('Chuck Norris can lock a safe and keep the key inside it.', $joke);
    }
}

<?php
namespace DanyelKeddah\ChuckNorrisJokes;

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;

class JokeFactory
{
    const API_ENDPOINT = 'http://api.icndb.com/jokes/random';
    
    protected $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    /// not handling errors here
    public function getRandomJoke()
    {
        $response = $this->client->get(self::API_ENDPOINT);

        $joke = json_decode($response->getBody()->getContents());

        return $joke->value->joke;
    }
}

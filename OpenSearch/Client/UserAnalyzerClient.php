<?php

namespace OpenSearch\Client;

use AlibabaCloud\SDK\OpenSearch\V20171225\Models\ListUserAnalyzersRequest;
use OpenSearch\Client;
use OpenSearch\Contracts\ClientInterface;
use OpenSearch\Requests\CreateUserAnalyzerBodyRequest;

class UserAnalyzerClient
{
    private Client $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function list()
    {
        return $this->client->create()
            ->listUserAnalyzers($this->req());
    }

    public function create(array $bodyData)
    {
        $body = new CreateUserAnalyzerBodyRequest($bodyData);
        return $this->client->create()
            ->setBody($body)
            ->createUserAnalyzer();
    }

    public function req(): ListUserAnalyzersRequest
    {
        return new ListUserAnalyzersRequest([]);
    }

}

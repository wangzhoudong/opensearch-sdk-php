<?php

namespace OpenSearch\Client;

use AlibabaCloud\SDK\OpenSearch\V20171225\Models\ListQueryProcessorsRequest;
use OpenSearch\Client;
use OpenSearch\Contracts\ClientInterface;
use OpenSearch\Requests\CreateQueryProcessorBodyRequest;
use OpenSearch\Requests\CreateQueryProcessorRequest;

class QueryProcessorClient
{
    private Client $client;
    private string $identity;
    private string $appId;
    private string $dryRun = 'false';

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function list()
    {
        return $this->client->create()
            ->listQueryProcessors($this->getIdentity(), $this->getAppId(), $this->req());
    }


    public function create(array $bodyData)
    {
        $body = new CreateQueryProcessorBodyRequest($bodyData);
        $req = new CreateQueryProcessorRequest(['dryRun' => $this->isDryRun()]);

        return $this->client->create()
            ->setBody($body)
            ->createQueryProcessor($this->getIdentity(), $this->getAppId(), $req);
    }

    public function req(): ListQueryProcessorsRequest
    {
        return new ListQueryProcessorsRequest([]);
    }

    /**
     * @return string
     */
    public function getIdentity(): string
    {
        return $this->identity;
    }

    /**
     * @param string $identity
     */
    public function setIdentity(string $identity): void
    {
        $this->identity = $identity;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     */
    public function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function isDryRun(): string
    {
        return $this->dryRun;
    }

    /**
     * @param string $dryRun
     */
    public function setDryRun(string $dryRun): void
    {
        $this->dryRun = $dryRun;
    }

}

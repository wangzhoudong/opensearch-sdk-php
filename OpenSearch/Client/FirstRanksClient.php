<?php

namespace OpenSearch\Client;

use AlibabaCloud\SDK\OpenSearch\V20171225\Models\CreateQueryProcessorRequest;
use AlibabaCloud\SDK\OpenSearch\V20171225\Models\ListQueryProcessorsRequest;
use OpenSearch\Client;
use OpenSearch\Contracts\ClientInterface;
use OpenSearch\Requests\CreateQueryProcessorBodyRequest;

class FirstRanksClient
{
    private Client $client;
    private string $identity;
    private string $appId;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function list()
    {
        return $this->client->create()
            ->listFirstRanks($this->getIdentity(), $this->getAppId());
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


}

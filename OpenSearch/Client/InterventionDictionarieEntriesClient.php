<?php

namespace OpenSearch\Client;

use AlibabaCloud\SDK\OpenSearch\V20171225\Models\ListInterventionDictionaryEntriesRequest;
use OpenSearch\Client;
use OpenSearch\Contracts\ClientInterface;
use OpenSearch\Requests\PushInterventionDictionaryEntriesBodyRequest;

class InterventionDictionarieEntriesClient
{
    private Client $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $name
     * @param int $limit
     * @param int $page
     * @param string|null $word
     * @return \AlibabaCloud\SDK\OpenSearch\V20171225\Models\ListInterventionDictionaryEntriesResponse
     */
    public function list(string $name, int $limit = 20, int $page = 1, string $word = null)
    {
        $config = [
            'pageNumber' => $page,
            'pageSize' => $limit,
            'word' => $word,
        ];
        $req = new ListInterventionDictionaryEntriesRequest($config);

        return $this->client->create()
            ->listInterventionDictionaryEntries($name, $req);
    }

    /**
     * @param string $name
     * @param array $datas
     * @return \AlibabaCloud\SDK\OpenSearch\V20171225\Models\PushInterventionDictionaryEntriesResponse
     */
    public function push(string $name, array $datas)
    {
        $body = new PushInterventionDictionaryEntriesBodyRequest(['list' => $datas]);
        return $this->client->create()
            ->setBody($body)
            ->pushInterventionDictionaryEntries($name);
    }
}

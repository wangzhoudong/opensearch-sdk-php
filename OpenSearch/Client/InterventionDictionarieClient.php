<?php

namespace OpenSearch\Client;

use AlibabaCloud\SDK\OpenSearch\V20171225\Models\ListInterventionDictionariesRequest;
use OpenSearch\Client;
use Arr;
use OpenSearch\Contracts\ClientInterface;
use OpenSearch\Exceptions\InterventionDictionarieTypeException;
use OpenSearch\Requests\CreateInterventionDictionaryBodyRequest;

class InterventionDictionarieClient
{
    private Client $client;

    public array $allowTypes = [
        'stopword' => '停用词',
        'synonym' => '同义词',
        'correction' => '拼写纠错',
        'category_prediction' => '实体识别',
        'ner' => '类目预测',
        'term_weighting' => '词权重',
    ];

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $limit
     * @param int $page
     * @param array $types
     * @return \AlibabaCloud\SDK\OpenSearch\V20171225\Models\ListInterventionDictionariesResponse
     */
    public function list(int $limit = 20, int $page = 1, array $types = [])
    {
        $req = new  ListInterventionDictionariesRequest([
            'pageSize' => $limit,
            'pageNumber' => $page,
            'types' => $this->checkType($types),
        ]);

        return $this->client->create()
            ->listInterventionDictionaries($req);
    }

    /**
     * @param array $body
     * @return \AlibabaCloud\SDK\OpenSearch\V20171225\Models\CreateInterventionDictionaryResponse
     */
    public function create(array $body)
    {
        $body = new CreateInterventionDictionaryBodyRequest($body);

        $this->checkType($body->type);

        return $this->client->create()
            ->setBody($body)
            ->createInterventionDictionary();
    }

    /**
     * @param string $name
     * @return \AlibabaCloud\SDK\OpenSearch\V20171225\Models\DescribeInterventionDictionaryResponse
     */
    public function describe(string $name)
    {
        return $this->client->create()
            ->describeInterventionDictionary($name);
    }

    /**
     * @param string $name
     * @return \AlibabaCloud\SDK\OpenSearch\V20171225\Models\RemoveInterventionDictionaryResponse
     */
    public function remove(string $name)
    {
        return $this->client->create()
            ->removeInterventionDictionary($name);
    }

    /**
     * @param $types
     * @return mixed
     */
    private function checkType($types)
    {
        foreach (Arr::wrap($types) as $type) {
            if (!in_array($type, array_keys($this->allowTypes))) {
                throw new InterventionDictionarieTypeException("【{$type}】不允许的类型.");
            }
        }
        return $types;
    }
}

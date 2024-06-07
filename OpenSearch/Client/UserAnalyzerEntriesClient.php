<?php

namespace OpenSearch\Client;

use AlibabaCloud\SDK\OpenSearch\V20171225\Models\ListUserAnalyzerEntriesRequest;
use OpenSearch\Client;
use OpenSearch\Contracts\ClientInterface;
use OpenSearch\Exceptions\UserAnalyzerEntriesCmdException;
use OpenSearch\Requests\CreateUserAnalyzerEntriesBodyRequest;
use OpenSearch\Requests\PushUserAnalyzerEntriesBodyRequest;
use Arr;

class UserAnalyzerEntriesClient
{
    private Client $client;

    public array $allowCmds = [
        'add' => '添加',
        'delete' => '删除',
    ];

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $name
     * @param int $pageNumber
     * @param int $pageSize
     * @param string|null $word
     * @return \AlibabaCloud\SDK\OpenSearch\V20171225\Models\ListUserAnalyzerEntriesResponse
     */
    public function list(string $name, int $pageNumber = 1, int $pageSize = 20, string $word = null)
    {
        $req = new ListUserAnalyzerEntriesRequest([
            'pageNumber' => $pageNumber,
            'pageSize' => $pageSize,
            'word' => $word,
        ]);

        return $this->client->create()
            ->listUserAnalyzerEntries($name, $req);
    }

    /**
     * @param string $name
     * @param array $datas
     * @return \AlibabaCloud\SDK\OpenSearch\V20171225\Models\PushUserAnalyzerEntriesResponse
     */
    public function push(string $name, array $datas)
    {
        $this->checkCmd(collect($datas)->pluck('cmd')->toArray());

        $body = new PushUserAnalyzerEntriesBodyRequest(['entries' => $datas]);

        return $this->client->create()
            ->setBody($body)
            ->pushUserAnalyzerEntries($name, $body);
    }


    /**
     * @param $cmds
     * @return mixed
     */
    private function checkCmd($cmds)
    {
        foreach (Arr::wrap($cmds) as $cmd) {
            if (!in_array($cmd, array_keys($this->allowCmds))) {
                throw new UserAnalyzerEntriesCmdException("【{$cmd}】不允许的词条操作类型.");
            }
        }
        return $cmds;
    }

}

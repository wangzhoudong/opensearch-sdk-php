<?php

namespace OpenSearch;

use Illuminate\Config\Repository;
use OpenSearch\Contracts\ClientInterface;

class Client implements ClientInterface
{
    private Repository $config;

    public function __construct(Repository $config)
    {
        $this->setConfig($config);
    }

    /**
     * @param Repository $config
     * @return OpenSearch
     */
    public function create(): OpenSearch
    {
        $config = new Config($this->getConfig());

        return new OpenSearch(
            $config
        );
    }

    /**
     * @return Repository
     */
    public function getConfig(): Repository
    {
        return $this->config;
    }

    /**
     * @param Repository $config
     */
    public function setConfig(Repository $config): void
    {
        $this->config = $config;
    }

}
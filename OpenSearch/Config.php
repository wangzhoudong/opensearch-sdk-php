<?php

namespace OpenSearch;

use Darabonba\OpenApi\Models\Config as BaseConfig;
use Illuminate\Config\Repository;

class Config extends BaseConfig
{
    /**
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $data = [
            // 您的AccessKey ID
            "accessKeyId" => $config->get('scout.opensearch.accessKey'),
            // 您的AccessKey Secret
            "accessKeySecret" => $config->get('scout.opensearch.accessSecret')
        ];

        parent::__construct($data);

        $this->endpoint = "opensearch.cn-beijing.aliyuncs.com";
    }
}
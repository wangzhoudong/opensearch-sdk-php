<?php

namespace OpenSearch\Contracts;

use AlibabaCloud\SDK\OpenSearch\V20171225\OpenSearch;

interface ClientInterface
{
    public function create(): OpenSearch;
}
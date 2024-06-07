<?php

namespace OpenSearch;

use AlibabaCloud\OpenApiUtil\OpenApiUtilClient;
use AlibabaCloud\SDK\OpenSearch\V20171225\Models\CreateInterventionDictionaryResponse;
use AlibabaCloud\SDK\OpenSearch\V20171225\Models\CreateQueryProcessorRequest;
use AlibabaCloud\SDK\OpenSearch\V20171225\Models\CreateQueryProcessorResponse;
use AlibabaCloud\SDK\OpenSearch\V20171225\Models\CreateUserAnalyzerResponse;
use AlibabaCloud\SDK\OpenSearch\V20171225\Models\PushInterventionDictionaryEntriesResponse;
use AlibabaCloud\SDK\OpenSearch\V20171225\Models\PushUserAnalyzerEntriesResponse;
use AlibabaCloud\SDK\OpenSearch\V20171225\OpenSearch as BaseOpenSearch;
use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;
use Darabonba\OpenApi\Models\OpenApiRequest;
use Darabonba\OpenApi\Models\Params;
use AlibabaCloud\Tea\Model;
use Log;

class OpenSearch extends BaseOpenSearch
{
    private ?Model $_body = null;

    public function pushUserAnalyzerEntriesWithOptions($name, $request, $headers, $runtime)
    {
        Utils::validateModel($this->getBody());

        $name = OpenApiUtilClient::getEncodeParam($name);
        $req = new OpenApiRequest([
            'headers' => $headers,
            'body' => $this->getBody()->toMap(),
        ]);

        $params = new Params([
            'action' => 'PushUserAnalyzerEntries',
            'version' => '2017-12-25',
            'protocol' => 'HTTPS',
            'pathname' => '/v4/openapi/user-analyzers/' . $name . '/entries/actions/bulk',
            'method' => 'POST',
            'authType' => 'AK',
            'style' => 'ROA',
            'reqBodyType' => 'json',
            'bodyType' => 'json',
        ]);

        return PushUserAnalyzerEntriesResponse::fromMap($this->callApi($params, $req, $runtime));
    }

    public function createUserAnalyzerWithOptions($headers, $runtime)
    {
        Utils::validateModel($this->getBody());

        $req = new OpenApiRequest([
            'headers' => $headers,
            'body' => $this->getBody()->toMap(),
        ]);

        $params = new Params([
            'action' => 'CreateUserAnalyzer',
            'version' => '2017-12-25',
            'protocol' => 'HTTPS',
            'pathname' => '/v4/openapi/user-analyzers',
            'method' => 'POST',
            'authType' => 'AK',
            'style' => 'ROA',
            'reqBodyType' => 'json',
            'bodyType' => 'json',
        ]);

        return CreateUserAnalyzerResponse::fromMap($this->callApi($params, $req, $runtime));
    }


    /**
     * @param string $appGroupIdentity
     * @param string $appId
     * @param CreateQueryProcessorRequest $request
     * @param string[] $headers
     * @param RuntimeOptions $runtime
     *
     * @return CreateQueryProcessorResponse
     */
    public function createQueryProcessorWithOptions($appGroupIdentity, $appId, $request, $headers, $runtime)
    {
        Utils::validateModel($this->getBody());
        Utils::validateModel($request);

        $appGroupIdentity = OpenApiUtilClient::getEncodeParam($appGroupIdentity);
        $appId = OpenApiUtilClient::getEncodeParam($appId);

        $query = [];
        if (!Utils::isUnset($request->dryRun)) {
            $query['dryRun'] = $request->dryRun;
        }
//        dd($query,$request);
        $req = new OpenApiRequest([
            'headers' => $headers,
            'body' => $this->getBody()->toMap(),
            'query' => OpenApiUtilClient::query($query),
        ]);

        $params = new Params([
            'action' => 'CreateQueryProcessor',
            'version' => '2017-12-25',
            'protocol' => 'HTTPS',
            'pathname' => '/v4/openapi/app-groups/' . $appGroupIdentity . '/apps/' . $appId . '/query-processors',
            'method' => 'POST',
            'authType' => 'AK',
            'style' => 'ROA',
            'reqBodyType' => 'json',
            'bodyType' => 'json',
        ]);
        return CreateQueryProcessorResponse::fromMap($this->callApi($params, $req, $runtime));
    }

    /**
     * @param string[] $headers
     * @param RuntimeOptions $runtime
     *
     * @return CreateInterventionDictionaryResponse
     */
    public function createInterventionDictionaryWithOptions($headers, $runtime)
    {
        Utils::validateModel($this->getBody());

        $req = new OpenApiRequest([
            'headers' => $headers,
            'body' => $this->getBody()->toMap(),
        ]);

        $params = new Params([
            'action' => 'CreateInterventionDictionary',
            'version' => '2017-12-25',
            'protocol' => 'HTTPS',
            'pathname' => '/v4/openapi/intervention-dictionaries',
            'method' => 'POST',
            'authType' => 'AK',
            'style' => 'ROA',
            'reqBodyType' => 'json',
            'bodyType' => 'json',
        ]);

        return CreateInterventionDictionaryResponse::fromMap($this->callApi($params, $req, $runtime));
    }

    /**
     * @param string $name
     * @param string[] $headers
     * @param RuntimeOptions $runtime
     *
     * @return PushInterventionDictionaryEntriesResponse
     */
    public function pushInterventionDictionaryEntriesWithOptions($name, $headers, $runtime)
    {
        $name = OpenApiUtilClient::getEncodeParam($name);

        Utils::validateModel($this->getBody());

        $req = new OpenApiRequest([
            'headers' => $headers,
            'body' => (object)$this->getBody()->toMap(),
        ]);

        $params = new Params([
            'action' => 'PushInterventionDictionaryEntries',
            'version' => '2017-12-25',
            'protocol' => 'HTTPS',
            'pathname' => '/v4/openapi/intervention-dictionaries/' . $name . '/entries/actions/bulk',
            'method' => 'POST',
            'authType' => 'AK',
            'style' => 'ROA',
            'reqBodyType' => 'json',
            'bodyType' => 'json',
        ]);

        return PushInterventionDictionaryEntriesResponse::fromMap($this->callApi($params, $req, $runtime));
    }

    /**
     * @return Model|null
     */
    public function getBody(): ?Model
    {
        return $this->_body;
    }

    /**
     * @param Model|null $body
     * @return $this
     */
    public function setBody(?Model $body): self
    {
        $this->_body = $body;
        return $this;
    }

}

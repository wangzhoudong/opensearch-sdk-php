<?php

namespace OpenSearch\Client;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

class ManageControlClient
{
    // 管控类-只有v4
    const API_VERSION = '4';
    const API_TYPE = 'openapi';

    private $version = '2017-12-25';
    private $openSearchClient = null;

    private $path = "/app-groups";

    /**
     * 构造方法。
     *
     * @param \OpenSearch\Client\OpenSearchClient $openSearchClient 基础类，负责计算签名，和服务端进行交互和返回结果。
     * @return void
     */
    public function __construct($openSearchClient)
    {
        $this->openSearchClient = $openSearchClient;

        AlibabaCloud::accessKeyClient($this->openSearchClient->accessKey, $this->openSearchClient->secret)
            ->regionId($this->openSearchClient->options['region_id'])
            ->asDefaultClient();
    }

    private function getPath($uri)
    {
        return "/v" . self::API_VERSION . "/" . self::API_TYPE . $uri;
    }

    public function addApp()
    {

    }

    /**
     *
     * removeAppVersion
     *
     * @param string $identity
     * @param array $appId
     * @return array|bool
     * @throws \Exception
     */
    public function removeAppVersion(string $identity, string $appId)
    {
        $path = $this->getPath($this->path . "/" . $identity . "/apps/".$appId);

        try {

            $response = AlibabaCloud::roa()
                ->product('OpenSearch')
                ->version($this->version)
                ->pathPattern($path)
                ->method('DELETE')
                ->body(json_encode([]))
                ->request();


            if ($response->isSuccess()) {
                return true;
            }
            return false;
        } catch (ClientException $e) {
            throw new \Exception($e->getErrorMessage());
        } catch (ServerException $e) {
            throw new \Exception($e->getErrorMessage());
        }
    }
    /**
     *
     * addAppVersion
     *
     * @param string $identity
     * @param bool $dryRun
     * @param array $body
     * @return array|bool
     * @throws \Exception
     */
    public function addAppVersion(string $identity, array $body, bool $dryRun = false)
    {
        $path = $this->getPath($this->path . "/" . $identity . "/apps");

        try {


            $response = AlibabaCloud::roa()
                ->product('OpenSearch')
                ->version($this->version)
                ->pathPattern($path)
                ->method('POST')
                ->body(json_encode($body))
                ->request();


            if ($response->isSuccess()) {
                $result = $response->toArray();
                return $result['result'] ?? [];
            }

            return false;
        } catch (ClientException $e) {
            throw new \Exception($e->getErrorMessage());
        } catch (ServerException $e) {
            throw new \Exception($e->getErrorMessage());
        }
    }


    /**
     *
     * switchAppVersionById
     *
     * @param $identity
     * @param $currentVersion
     * @return \OpenSearch\Generated\Common\OpenSearchResult
     */
    public function switchAppVersionById(string $identity, string $currentVersion)
    {
        $path = $this->getPath($this->path . "/" . $identity);

        try {
            $response = AlibabaCloud::roa()
                ->product('OpenSearch')
                ->version($this->version)
                ->pathPattern($path)
                ->method('PUT')
                ->options(['query' => []])
                ->body(json_encode(['currentVersion' => $currentVersion]))
                ->request();

            if ($response->isSuccess()) {
                $result = $response->toArray();
                return $result['result'] ?? [];
            }
            return false;
        } catch (ClientException $e) {
            throw new \Exception($e->getErrorMessage());
        } catch (ServerException $e) {
            throw new \Exception($e->getErrorMessage());
        }

    }

    public function getAppList()
    {
        $path = $this->getPath( "/apps");
        try {

            $response = AlibabaCloud::roa()
                ->product('OpenSearch')
                ->version($this->version)
                ->pathPattern($path)
                ->method('GET')
                ->body('{}')
                ->request();

            if ($response->isSuccess()) {
                $result = $response->toArray();
                return $result['result'] ? $result['result'] : [];
            }

            return false;
        } catch (ClientException $e) {
            throw new \Exception($e->getErrorMessage());
        } catch (ServerException $e) {
            throw new \Exception($e->getErrorMessage());
        }
    }


}

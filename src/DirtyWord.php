<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim;

use XuTL\QCloud\Tim\Http\BaseResponse;
use XuTL\QCloud\Tim\Http\HttpClient;
use XuTL\QCloud\Tim\Requests\AddDirtyWordRequest;
use XuTL\QCloud\Tim\Requests\DeleteDirtyWordRequest;
use XuTL\QCloud\Tim\Requests\ListDirtyWordRequest;

/**
 * 脏字
 * @package XuTL\QCloud\Tim
 */
class DirtyWord
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * Account constructor.
     * @param HttpClient $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * 获取脏字列表
     * @return Http\BaseResponse
     * @throws Exception\TIMException
     */
    public function getList()
    {
        $request = new ListDirtyWordRequest();
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 添加脏字
     * @param string|array $words
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function add($words)
    {
        $request = new AddDirtyWordRequest($words);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 删除脏字
     * @param string|array $words
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function delete($words)
    {
        $request = new DeleteDirtyWordRequest($words);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }
}

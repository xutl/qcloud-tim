<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim;

use XuTL\QCloud\Tim\Http\BaseResponse;
use XuTL\QCloud\Tim\Http\HttpClient;
use XuTL\QCloud\Tim\Requests\AccountImportRequest;
use XuTL\QCloud\Tim\Requests\AccountRegisterRequest;
use XuTL\QCloud\Tim\Requests\BatchAccountStateRequest;
use XuTL\QCloud\Tim\Requests\BatchSendMessageRequest;
use XuTL\QCloud\Tim\Requests\CreateGroupRequest;
use XuTL\QCloud\Tim\Requests\GetMessageHistoryRequest;
use XuTL\QCloud\Tim\Requests\ImportMessageRequest;
use XuTL\QCloud\Tim\Requests\ListGroupRequest;
use XuTL\QCloud\Tim\Requests\MultiAccountImportRequest;
use XuTL\QCloud\Tim\Requests\SendMessageRequest;
use XuTL\QCloud\Tim\Responses\AccountStateResponse;
use XuTL\QCloud\Tim\Responses\BatchSendMessageResponse;
use XuTL\QCloud\Tim\Responses\ImportMessageResponse;
use XuTL\QCloud\Tim\Responses\ListGroupResponse;
use XuTL\QCloud\Tim\Responses\MultiAccountImportResponse;
use XuTL\QCloud\Tim\Responses\SendMessageResponse;

/**
 * Class Tim
 * @package XuTL\QCloud\Tim
 */
class Tim
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * 签名实例
     * @var Signature
     */
    private $signature;

    /**
     * @var string 账户类型
     */
    private $accountType;

    /**
     * 账户管理员
     * @var string
     */
    private $administrator;

    /**
     * Client constructor.
     * @param string $appId SdkAppid
     * @param string $accountType 账户类型
     * @param string $privateKey 私钥
     * @param string $publicKey 公钥
     * @param string $administrator 管理员账户
     * @param Config|null $config 配置
     */
    public function __construct($appId, $accountType, $privateKey, $publicKey, $administrator, Config $config = NULL)
    {
        $this->signature = new Signature($appId, $accountType, $privateKey, $publicKey);
        $this->client = new HttpClient($appId, $accountType, $this->signature, $administrator, $config);
        $this->accountType = $accountType;
        $this->administrator = $administrator;
    }

    /**
     * 获取账户登录签名
     * @param string $identifier
     * @param int $expire
     * @return string
     */
    public function getLoginSignature($identifier, $expire = 86400)
    {
        return $this->signature->make((string)$identifier, $expire);
    }

    /**
     * @param array $identifiers
     * @return AccountStateResponse|BaseResponse
     * @throws Exception\TIMException
     */
    public function batchQueryState($identifiers)
    {
        $request = new BatchAccountStateRequest($identifiers);
        $response = new AccountStateResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 获取账号操作实例
     * @param string $identifier
     * @return Account
     */
    public function getAccount($identifier)
    {
        return new Account($this->client, $identifier);
    }

    /**
     * 获取关系操作实例
     * @param string $identifier
     * @return Friend
     */
    public function getFriend($identifier)
    {
        return new Friend($this->client, $identifier);
    }

    /**
     * 发送单聊消息
     * @param SendMessageRequest $request
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function sendMessage(SendMessageRequest $request)
    {
        $response = new SendMessageResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 发送单聊消息
     * @param BatchSendMessageRequest $request
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function batchSendMessage(BatchSendMessageRequest $request)
    {
        $response = new BatchSendMessageResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 消息导入系统
     * @param ImportMessageRequest $request
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function importMessage(ImportMessageRequest $request)
    {
        $response = new ImportMessageResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 获取聊天消息历史
     * @param string $chatType C2C/Group
     * @param string $time
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function getMessageHistory($chatType, $time)
    {
        $request = new GetMessageHistoryRequest($chatType, $time);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 托管模式存量账号导入
     * @param string $identifier 用户名，长度不超过 32 字节
     * @param int $identifierType Identifier的类型，1:手机号(国家码-手机号) 2:邮箱 3:字符串帐号
     * @param string $passport Identifier的密码，长度为8-16个字符。
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function accountRegister($identifier, $identifierType, $passport)
    {
        $request = new AccountRegisterRequest($identifier, $identifierType, $passport);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 异步 托管模式存量账号导入
     * @param string $identifier 用户名，长度不超过 32 字节
     * @param int $identifierType Identifier的类型，1:手机号(国家码-手机号) 2:邮箱 3:字符串帐号
     * @param string $passport Identifier的密码，长度为8-16个字符。
     * @param AsyncCallback|null $callback 回调
     * @return Http\Promise
     * @throws Exception\TIMException
     */
    public function accountRegisterAsync($identifier, $identifierType, $passport, AsyncCallback $callback = null)
    {
        $request = new AccountRegisterRequest($identifier, $identifierType, $passport);
        $response = new BaseResponse();
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    /**
     * 导入账户
     * @param string $identifier
     * @param string $nickname
     * @param string $faceUrl
     * @param int $type
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function accountImport($identifier, $nickname, $faceUrl, $type = 0)
    {
        $request = new AccountImportRequest($identifier, $nickname, $faceUrl, $type);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 异步导入账户
     * @param string $identifier
     * @param string $nickname
     * @param string $faceUrl
     * @param int $type
     * @param AsyncCallback|null $callback
     * @return Http\Promise
     * @throws Exception\TIMException
     */
    public function accountImportAsync($identifier, $nickname, $faceUrl, $type = 0, AsyncCallback $callback = null)
    {
        $request = new AccountImportRequest($identifier, $nickname, $faceUrl, $type);
        $response = new BaseResponse();
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    /**
     * 批量导入账户
     * @param array $accounts
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function multiAccountImport($accounts)
    {
        $request = new MultiAccountImportRequest($accounts);
        $response = new MultiAccountImportResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 异步批量导入账户
     * @param array $accounts
     * @param AsyncCallback|null $callback
     * @return Http\Promise
     * @throws Exception\TIMException
     */
    public function multiAccountImportAsync($accounts, AsyncCallback $callback = null)
    {
        $request = new MultiAccountImportRequest($accounts);
        $response = new MultiAccountImportResponse();
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    /**
     * 获取群组操作实例
     * @param string $groupId
     * @return Group
     */
    public function getGroup($groupId)
    {
        return new Group($this->client, $groupId);
    }

    /**
     * 创建圈子
     * @param CreateGroupRequest $request
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function createGroup(CreateGroupRequest $request)
    {
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 异步创建圈子
     * @param CreateGroupRequest $request
     * @param AsyncCallback|null $callback
     * @return Http\Promise
     * @throws Exception\TIMException
     */
    public function createGroupAsync(CreateGroupRequest $request, AsyncCallback $callback = null)
    {
        $response = new BaseResponse();
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    /**
     * 获取群组列表
     * @param ListGroupRequest $request
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function listGroup(ListGroupRequest $request)
    {
        $response = new ListGroupResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 获取脏字操作实例
     * @return DirtyWord
     */
    public function getDirtyWord()
    {
        return new DirtyWord($this->client);
    }
}

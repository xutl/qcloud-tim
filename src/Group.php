<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim;


use XuTL\QCloud\Tim\Http\HttpClient;

class Group
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * 群组标识
     * @var string
     */
    protected $groupId;

    /**
     * Account constructor.
     * @param HttpClient $client
     * @param string $groupId
     */
    public function __construct(HttpClient $client, $groupId)
    {
        $this->client = $client;
        $this->groupId = $groupId;
    }
}

<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Requests;

use XuTL\QCloud\Tim\Http\BaseRequest;

/**
 * 批量导入账户
 * @package XuTL\QCloud\Tim\Requests
 */
class MultiAccountImportRequest extends BaseRequest
{
    /**
     * AccountImportRequest constructor.
     */
    public function __construct()
    {
        parent::__construct('POST', 'v4/im_open_login_svc/multiaccount_import');
    }

    /**
     * 用户账户
     * @param array $accounts
     * @return $this
     */
    public function setAccounts(array $accounts)
    {
        $this->setParameter('Accounts', $accounts);
        return $this;
    }
}

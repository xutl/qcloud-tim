<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim;


class Constants
{
    //用户性别
    const GENDER_TYPE_UNKNOWN = 'Gender_Type_Unknown';//没设置
    const GENDER_TYPE_FEMALE = 'Gender_Type_Female';//女
    const GENDER_TYPE_MALE = 'Gender_Type_Male';//男

    //管理员禁止加好友标识
    const ADMIN_FORBID_TYPE_NONE = 'AdminForbid_Type_None';
    const ADMIN_FORBID_TYPE_SENDOUT = 'AdminForbid_Type_SendOut';

    //加好友验证方式
    const ALLOW_TYPE_NEED_CONFIRM = 'AllowType_Type_NeedConfirm';
    const ALLOW_TYPE_ALLOW_ANY = 'AllowType_Type_AllowAny';
    const ALLOW_TYPE_DENY_ANY = 'AllowType_Type_DenyAny';

    //群组类型
    const GROUP_TYPE_PUBLIC = 'Public';
    const GROUP_TYPE_PRIVATE = 'Private';
    const GROUP_TYPE_CHAT_ROOM = 'ChatRoom';
    const GROUP_TYPE_AV_CHAT_ROOM = 'AVChatRoom';
    const GROUP_TYPE_B_CHAT_ROOM = 'BChatRoom';

    //加群处理方式
    const GROUP_APPLY_JOIN_OPTION_FREE_ACCESS = 'FreeAccess';
    const GROUP_APPLY_JOIN_OPTION_NEED_PERMISSION = 'NeedPermission';
    const GROUP_APPLY_JOIN_OPTION_DISABLE_APPLY = 'DisableApply';

    //删除好友模式
    const FRIEND_DELETE_TYPE_SINGLE = 'Delete_Type_Single';//单向删除
    const FRIEND_DELETE_TYPE_BOTH = 'Delete_Type_Both';//双向删除

    //校验好友模式
    const FRIEND_CHECK_TYPE__SINGLE = 'CheckResult_Type_Singal';
    const FRIEND_CHECK_TYPE__BOTH = 'CheckResult_Type_Both';

    //黑名单校验
    const BLACK_CHECK_RESULT_TYPE_SINGAL = 'BlackCheckResult_Type_Singal';
    const BLACK_CHECK_RESULT_TYPE_BOTH = 'BlackCheckResult_Type_Both';

    //聊天类型
    const CHAT_TYPE_C2C = 'C2C';
    const CHAT_TYPE_GROUP = 'Group';

}

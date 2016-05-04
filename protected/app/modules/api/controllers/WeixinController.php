<?php
/**


 * User: 陈晓发
 * Date: 2016/3/21
 * Time: 11:54
 */

namespace app\modules\api\controllers;


use app\managers\WeixinManager;
use app\modules\api\validators\AppIdValidator;
use app\modules\api\validators\SetMenuValidator;

class WeixinController extends ApiController
{

	protected $appModel = null;
	protected $appId = null;


	public function actionSetMenu()
	{
		/** @var AppIdValidator $vAppId */
		$vAppId = AppIdValidator::createFromGetParams();

		if (!$vAppId->validate())
		{
			$vAppId->T();
		}

		$wxMgr = WeixinManager::getInstance(['wxAppModel'=>$vAppId->wxAppModel]);

		$wxMgr->setMenu();

//		/** @var SetMenuValidator $vSetMenu */
//		$vSetMenu = SetMenuValidator::createFromGetParams();
//
//		if (!$vSetMenu->validate())
//		{
//			$vAppId->T();
//		}
//


	}
}
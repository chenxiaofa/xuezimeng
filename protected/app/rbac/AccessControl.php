<?php
namespace app\rbac;
use yii\base\ActionFilter;
use yii\di\Instance;
use yii\web\User;
use yii\web\ForbiddenHttpException;
/**


 * User: 陈晓发
 * Date: 2016/3/21
 * Time: 13:56
 */
class AccessControl extends ActionFilter
{

	/** @var User */
	public $user = 'user';
	/** @var RbacManager */
	protected $m = null;
	protected $permissions = [];
	protected $publicPermission = [];
	public function init()
	{
		parent::init();
		$this->m = \Yii::$app->getAuthManager();
		$this->user = Instance::ensure($this->user, User::className());
	}


	public function beforeAction($action)
	{
		$className = get_class($action->controller);
		$actionId = $action->id;

		if ($this->m->isPublic($className,$actionId))
		{//是否公开接口
			return parent::beforeAction($action);
		}

		if ($this->user->getIsGuest() || !$this->m->canAccess($this->user->identity->role_id,$className,$actionId))
		{//必须登录
			throw new ForbiddenHttpException;
		}

		return parent::beforeAction($action);

	}


}
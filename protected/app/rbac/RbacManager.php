<?php
namespace app\rbac;
use yii\rbac\BaseManager;
use app\rbac\permissions\Permission;
use yii\rbac\Item;
use Yii;
use yii\web\ForbiddenHttpException;

/**


 * User: 陈晓发
 * Date: 2016/3/21
 * Time: 13:36
 * @property mixed publicPermission
 */
class RbacManager extends BaseManager
{

	const SUPPER_ADMIN_ROLE = 0;

	public $permissionFile = '@app/rbac/permissions.php';
	public $roleFile = '@app/rbac/roles.php';

	/** @var array items */
	protected $items = [];

	/** @var array permission of role */
	protected $rolesPermission = [];

	protected $publicPermission = null;
	protected $permissions = null;

	public function init()
	{
		parent::init(); // TODO: Change the autogenerated stub
	}

	/**
	 * Returns the named auth item.
	 * @param string $name the auth item name.
	 * @return \yii\rbac\Item the auth item corresponding to the specified name. Null is returned if no such item.
	 */
	protected function getItem($name)
	{
		// TODO: Implement getItem() method.
	}

	private function toFullActionName($class,$action)
	{
		return $class.'::'.$action;
	}

	public function isPublic($class,$action)
	{
		return array_key_exists($this->toFullActionName($class,$action),$this->getPublicPermission());
	}

	protected function getPublicPermission()
	{
		if (is_null($this->publicPermission))
		{
			$this->getItems(Item::TYPE_PERMISSION);
		}
		return $this->publicPermission;
	}


	/**
	 * Returns true if role can access specified action
	 * @param integer $role id of role
	 * @param $class
	 * @param $action
	 * @return bool
	 * @throws ForbiddenHttpException
	 * @throws \yii\base\InvalidConfigException
	 */
	public function canAccess($role,$class,$action)
	{
		if ($role == self::SUPPER_ADMIN_ROLE )
		{
			return true;
		}

		$permissions = $this->getPermissionByAction($class,$action);
		$havePermissions = $this->getPermissionByRoleId($role);

		$validPermission = array_intersect($havePermissions,array_keys($permissions));

		if (empty($validPermission))
		{
			throw new ForbiddenHttpException('You are not allowed to access this action');
		}

		foreach($validPermission as $permissionName)
		{
			$config = $permissions[$permissionName];
			$config['class'] = Permission::className();
			$config['name'] = $permissionName;
			/** @var Permission $permission */
			Yii::createObject($config)->check();
		}

		return true;

	}

	protected function getPermissionByRoleId($role)
	{
		$roles = $this->getRoles();
		if (array_key_exists($role,$roles))
		{
			return $roles[$role]['permission'];
		}
		return [];
	}

	protected  function getPermissionByAction($class,$action)
	{
		$permissions = $this->getPermissions();
		$fullAction = $this->toFullActionName($class,$action);

		if (!array_key_exists($fullAction,$permissions))
		{
			return [];
		}

		return $permissions[$fullAction];

	}

	/**
	 * @return array
	 */
	private function loadPermissionFromFile()
	{
		$file = Yii::getAlias($this->permissionFile);
		$map = [];
		if (!is_null($file) && file_exists($file))
		{
			foreach( include $file as $name=>$item )
			{
				foreach($item['actions'] as $action)
				{
					$map[$action][$name] = &$item;
					if ($item['access'] === Permission::ACCESS_TYPE_PUBLIC)
					{
						$this->publicPermission[$action][$name] = $item;
					}
				}
			}
		}
		return  $map;
	}


	/**
	 * @return array|mixed
	 */
	private function loadRoleFromFile()
	{
		$file = Yii::getAlias($this->roleFile);
		if (!is_null($file) && file_exists($file))
		{
			return include $file;
		}
		return [];
	}

	/**
	 * Returns the items of the specified type.
	 * @param integer $type the auth item type (either [[Item::TYPE_ROLE]] or [[Item::TYPE_PERMISSION]]
	 * @return \yii\rbac\Item[] the auth items of the specified type.
	 */
	protected function getItems($type)
	{
		if (!array_key_exists($type,$this->items))
		{
			switch ($type)
			{
				case Item::TYPE_ROLE:
					$this->items[$type] = $this->loadRoleFromFile();
					break;
				case Item::TYPE_PERMISSION:
					$this->items[$type] = $this->loadPermissionFromFile();
					break;
			}
		}

		return $this->items[$type];
	}

	/**
	 * Adds an auth item to the RBAC system.
	 * @param \yii\rbac\Item $item the item to add
	 * @return boolean whether the auth item is successfully added to the system
	 * @throws \Exception if data validation or saving fails (such as the name of the role or permission is not unique)
	 */
	protected function addItem($item)
	{
		// TODO: Implement addItem() method.
	}

	/**
	 * Adds a rule to the RBAC system.
	 * @param \yii\rbac\Rule $rule the rule to add
	 * @return boolean whether the rule is successfully added to the system
	 * @throws \Exception if data validation or saving fails (such as the name of the rule is not unique)
	 */
	protected function addRule($rule)
	{
		// TODO: Implement addRule() method.
	}

	/**
	 * Removes an auth item from the RBAC system.
	 * @param \yii\rbac\Item $item the item to remove
	 * @return boolean whether the role or permission is successfully removed
	 * @throws \Exception if data validation or saving fails (such as the name of the role or permission is not unique)
	 */
	protected function removeItem($item)
	{
		// TODO: Implement removeItem() method.
	}

	/**
	 * Removes a rule from the RBAC system.
	 * @param \yii\rbac\Rule $rule the rule to remove
	 * @return boolean whether the rule is successfully removed
	 * @throws \Exception if data validation or saving fails (such as the name of the rule is not unique)
	 */
	protected function removeRule($rule)
	{
		// TODO: Implement removeRule() method.
	}

	/**
	 * Updates an auth item in the RBAC system.
	 * @param string $name the name of the item being updated
	 * @param \yii\rbac\Item $item the updated item
	 * @return boolean whether the auth item is successfully updated
	 * @throws \Exception if data validation or saving fails (such as the name of the role or permission is not unique)
	 */
	protected function updateItem($name, $item)
	{
		// TODO: Implement updateItem() method.
	}

	/**
	 * Updates a rule to the RBAC system.
	 * @param string $name the name of the rule being updated
	 * @param \yii\rbac\Rule $rule the updated rule
	 * @return boolean whether the rule is successfully updated
	 * @throws \Exception if data validation or saving fails (such as the name of the rule is not unique)
	 */
	protected function updateRule($name, $rule)
	{
		// TODO: Implement updateRule() method.
	}

	/**
	 * Checks if the user has the specified permission.
	 * @param string|integer $userId the user ID. This should be either an integer or a string representing
	 * the unique identifier of a user. See [[\yii\web\User::id]].
	 * @param string $permissionName the name of the permission to be checked against
	 * @param array $params name-value pairs that will be passed to the rules associated
	 * with the roles and permissions assigned to the user.
	 * @return boolean whether the user has the specified permission.
	 * @throws \yii\base\InvalidParamException if $permissionName does not refer to an existing permission
	 */
	public function checkAccess($userId, $permissionName, $params = [])
	{
		// TODO: Implement checkAccess() method.
	}

	/**
	 * Returns the roles that are assigned to the user via [[assign()]].
	 * Note that child roles that are not assigned directly to the user will not be returned.
	 * @param string|integer $userId the user ID (see [[\yii\web\User::id]])
	 * @return \yii\rbac\Role[] all roles directly assigned to the user. The array is indexed by the role names.
	 */
	public function getRolesByUser($userId)
	{
		// TODO: Implement getRolesByUser() method.
	}

	/**
	 * Returns all permissions that the specified role represents.
	 * @param string $roleName the role name
	 * @return \yii\rbac\Permission[] all permissions that the role represents. The array is indexed by the permission names.
	 */
	public function getPermissionsByRole($roleName)
	{
		// TODO: Implement getPermissionsByRole() method.
	}

	/**
	 * Returns all permissions that the user has.
	 * @param string|integer $userId the user ID (see [[\yii\web\User::id]])
	 * @return \yii\rbac\Permission[] all permissions that the user has. The array is indexed by the permission names.
	 */
	public function getPermissionsByUser($userId)
	{
		// TODO: Implement getPermissionsByUser() method.
	}

	/**
	 * Returns the rule of the specified name.
	 * @param string $name the rule name
	 * @return null|\yii\rbac\Rule the rule object, or null if the specified name does not correspond to a rule.
	 */
	public function getRule($name)
	{
		// TODO: Implement getRule() method.
	}

	/**
	 * Returns all rules available in the system.
	 * @return \yii\rbac\Rule[] the rules indexed by the rule names
	 */
	public function getRules()
	{
		// TODO: Implement getRules() method.
	}

	/**
	 * Adds an item as a child of another item.
	 * @param \yii\rbac\Item $parent
	 * @param \yii\rbac\Item $child
	 * @return boolean whether the child successfully added
	 * @throws \yii\base\Exception if the parent-child relationship already exists or if a loop has been detected.
	 */
	public function addChild($parent, $child)
	{
		// TODO: Implement addChild() method.
	}

	/**
	 * Removes a child from its parent.
	 * Note, the child item is not deleted. Only the parent-child relationship is removed.
	 * @param \yii\rbac\Item $parent
	 * @param \yii\rbac\Item $child
	 * @return boolean whether the removal is successful
	 */
	public function removeChild($parent, $child)
	{
		// TODO: Implement removeChild() method.
	}

	/**
	 * Removed all children form their parent.
	 * Note, the children items are not deleted. Only the parent-child relationships are removed.
	 * @param \yii\rbac\Item $parent
	 * @return boolean whether the removal is successful
	 */
	public function removeChildren($parent)
	{
		// TODO: Implement removeChildren() method.
	}

	/**
	 * Returns a value indicating whether the child already exists for the parent.
	 * @param \yii\rbac\Item $parent
	 * @param \yii\rbac\Item $child
	 * @return boolean whether `$child` is already a child of `$parent`
	 */
	public function hasChild($parent, $child)
	{
		// TODO: Implement hasChild() method.
	}

	/**
	 * Returns the child permissions and/or roles.
	 * @param string $name the parent name
	 * @return \yii\rbac\Item[] the child permissions and/or roles
	 */
	public function getChildren($name)
	{
		// TODO: Implement getChildren() method.
	}

	/**
	 * Assigns a role to a user.
	 *
	 * @param \yii\rbac\Role $role
	 * @param string|integer $userId the user ID (see [[\yii\web\User::id]])
	 * @return \yii\rbac\Assignment the role assignment information.
	 * @throws \Exception if the role has already been assigned to the user
	 */
	public function assign($role, $userId)
	{
		// TODO: Implement assign() method.
	}

	/**
	 * Revokes a role from a user.
	 * @param \yii\rbac\Role $role
	 * @param string|integer $userId the user ID (see [[\yii\web\User::id]])
	 * @return boolean whether the revoking is successful
	 */
	public function revoke($role, $userId)
	{
		// TODO: Implement revoke() method.
	}

	/**
	 * Revokes all roles from a user.
	 * @param mixed $userId the user ID (see [[\yii\web\User::id]])
	 * @return boolean whether the revoking is successful
	 */
	public function revokeAll($userId)
	{
		// TODO: Implement revokeAll() method.
	}

	/**
	 * Returns the assignment information regarding a role and a user.
	 * @param string $roleName the role name
	 * @param string|integer $userId the user ID (see [[\yii\web\User::id]])
	 * @return null|\yii\rbac\Assignment the assignment information. Null is returned if
	 * the role is not assigned to the user.
	 */
	public function getAssignment($roleName, $userId)
	{
		// TODO: Implement getAssignment() method.
	}

	/**
	 * Returns all role assignment information for the specified user.
	 * @param string|integer $userId the user ID (see [[\yii\web\User::id]])
	 * @return \yii\rbac\Assignment[] the assignments indexed by role names. An empty array will be
	 * returned if there is no role assigned to the user.
	 */
	public function getAssignments($userId)
	{
		// TODO: Implement getAssignments() method.
	}

	/**
	 * Returns all user IDs assigned to the role specified.
	 * @param string $roleName
	 * @return array array of user ID strings
	 * @since 2.0.7
	 */
	public function getUserIdsByRole($roleName)
	{
		// TODO: Implement getUserIdsByRole() method.
	}

	/**
	 * Removes all authorization data, including roles, permissions, rules, and assignments.
	 */
	public function removeAll()
	{
		// TODO: Implement removeAll() method.
	}

	/**
	 * Removes all permissions.
	 * All parent child relations will be adjusted accordingly.
	 */
	public function removeAllPermissions()
	{
		// TODO: Implement removeAllPermissions() method.
	}

	/**
	 * Removes all roles.
	 * All parent child relations will be adjusted accordingly.
	 */
	public function removeAllRoles()
	{
		// TODO: Implement removeAllRoles() method.
	}

	/**
	 * Removes all rules.
	 * All roles and permissions which have rules will be adjusted accordingly.
	 */
	public function removeAllRules()
	{
		// TODO: Implement removeAllRules() method.
	}

	/**
	 * Removes all role assignments.
	 */
	public function removeAllAssignments()
	{
		// TODO: Implement removeAllAssignments() method.
	}
}
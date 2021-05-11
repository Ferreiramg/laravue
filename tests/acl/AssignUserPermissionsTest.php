<?php

namespace Test\acl;

use Tests\Group;
use Tests\Permission;
use Tests\TestCase;
use Tests\User;

class AssignUserPermissionsTest extends TestCase
{
    public function testSouldAssignPermissionGroup()
    {
        $data = $this->dataUserProvider();
        $group = app(Group::class)->find(1);//RH
        $group->assignPermissions([2,3,4]);

        $user = $data[2];
        $user->assignGroup($group);
        
        $this->assertTrue($user->hasGroup(1));

        $this->assertTrue($user->hasPermissionThroughGroup(Permission::find(3)));//tem permissão dentro do grupo

        $this->assertTrue($group->hasPermission(Permission::find(2)));// o grupo tem a permisão

    }
    public function testSouldAssignPermission()
    {
        $data = $this->dataUserProvider();

        $this->assertTrue($data[1]->hasPermission(3));
    }

    public function dataUserProvider()
    {
        $user1 = User::find(1);
        $user2 = User::find(2);
        $user3 = User::find(3);
        $user1->assignPermissions(Permission::find(1));//admin
        $user2->assignPermissions([Permission::find(3),Permission::find(2)]);//view write
        $user3->assignPermissions([Permission::find(4)]);
        return [
            $user1,
            $user2,
            $user3,
        ];
    }
}

<?php

namespace Tests\acl;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Junges\ACL\Exceptions\UnauthorizedException;
use Junges\ACL\Middlewares\GroupMiddleware;
use Junges\ACL\Middlewares\HierarchicalPermissionsMiddleware;
use Junges\ACL\Middlewares\PermissionMiddleware;
use Junges\ACL\Middlewares\PermissionOrGroupMiddleware;
use Tests\TestCase;

class MiddlewareTestCase extends TestCase
{
    /**
     * @var PermissionMiddleware
     */
    protected $permissionMiddleware;

    /**
     * @var GroupMiddleware
     */
    protected $groupMiddleware;

    /**
     * @var PermissionOrGroupMiddleware
     */
    protected $permissionOrGroupMiddleware;

    /**
     * @var HierarchicalPermissionsMiddleware
     */
    protected $hierarchicalMiddleware;

    public function setUp(): void
    {
        parent::setUp();
        $this->permissionMiddleware = new PermissionMiddleware($this->app);
        $this->groupMiddleware = new GroupMiddleware($this->app);
        $this->permissionOrGroupMiddleware = new PermissionOrGroupMiddleware($this->app);
        $this->hierarchicalMiddleware = new HierarchicalPermissionsMiddleware($this->app);

        Route::get('/test-admin', function () {
            return 'nice';
        })->middleware('permissions:admin');
    }
}

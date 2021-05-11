<?php

namespace Test\acl\middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Junges\ACL\Exceptions\UnauthorizedException;
use Tests\acl\MiddlewareTestCase;
use Tests\Permission;
use Tests\User;

class AdminTest extends MiddlewareTestCase
{
    public function testShoudGetMiddlewareAdminWithSuccess()
    {
        $perm = app(Permission::class)->find(1);
        Auth::login(User::find(1));

        Auth::user()->assignPermissions($perm);

        $response =  $this->execMiddleware($this->permissionMiddleware, [$perm->slug]);
        
        $this->assertEquals($response, 200);
    }

    protected function execMiddleware($middleware, $parameter)
    {
        try {
            return $middleware->handle(new Request(), function () {
                return (new Response())->setContent('<html></html>');
            }, $parameter)->status();
        } catch (UnauthorizedException $exception) {
            return $exception->getStatusCode();
        }
    }
}

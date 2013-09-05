<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Tests\Http\EntryPoint;

use Symfony\Component\Security\Http\EntryPoint\Http403ForbiddenEntryPoint;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class Http403ForbiddenEntryPointTest extends \PHPUnit_Framework_TestCase
{
    public function testStart()
    {
        $request = $this->getMock('Symfony\Component\HttpFoundation\Request');

        $authException = new AuthenticationException('The exception message');

        $entryPoint = new Http403ForbiddenEntryPoint('TheRealmName');
        $response = $entryPoint->start($request, $authException);

        $this->assertEquals(403, $response->getStatusCode());
    }

    public function testStartWithoutAuthException()
    {
        $request = $this->getMock('Symfony\Component\HttpFoundation\Request');

        $entryPoint = new Http403ForbiddenEntryPoint('TheRealmName');

        $response = $entryPoint->start($request);

        $this->assertEquals(403, $response->getStatusCode());
    }
}

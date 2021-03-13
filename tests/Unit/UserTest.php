<?php

declare(strict_types=1);

namespace Tests\Unit;

require_once __DIR__ . '/../../helpers.php';

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function find_User()
    {
        $user = \App\Models\User::find(1);

        print_r($user);
        $this->assertEquals(1, $user[0]['id']);
    }
}

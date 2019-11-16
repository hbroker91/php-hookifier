<?php

namespace Hbroker91\PHPHookifier;

use PHPUnit\Framework\TestCase;

/**
 * Class HookableTest
 * @covers Hbroker91\PHPHookifier\Hookify
 * @package Hbroker91\PHPHookifier
 */
class HookifyTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        $this->user = new class
        {
            use Hookify;
            /**
             * ### Executes custom logic before class instantiation
             *
             * @param array $options - optional arguments
             *
             * @return bool
             */
            public static function beforeConstruct(...$options): bool
            {
                [$payload] = $options;
                return isset($payload['userData']);
            }

            /**
             * ### Executes custom logic after class destruction
             *
             * @param array $options - optional arguments
             *
             * @return bool
             */
            public static function afterDestroy(...$options): bool
            {
                [$success] = $options;
                return $success;
            }
        };
    }

    public function testBeforeConstruct(): void
    {
        $this->assertTrue(
            $this->user::beforeConstruct([
                'userData' => [
                    'name' => 'test',
                    'phone' => '+3630111222'
                ]
            ]));
    }

    public function testAfterDestroy(): void
    {
        $this->assertTrue(
            $this->user::afterDestroy($isSucceeded = true)
        );
    }

    protected function tearDown(): void
    {
        unset($this->user);
    }

}

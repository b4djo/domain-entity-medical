<?php

namespace Medical\Tests\unit\entities\Client;

use Medical\Entities\Client\Name;
use PHPUnit\Framework\TestCase;

/**
 * Class RenameTest
 * @package Medical\tests\unit\entities\Client
 */
class RenameTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testSuccess()
    {
        $client = ClientBuilder::instance()->withId(7)->build();

        $client->rename($name = new Name('Петров', 'Петр', 'Петрович'));

        $this->assertEquals($name, $client->getName());
    }
}

<?php

namespace robertobadjio\medical\tests\unit\repositories;

use PHPUnit\Framework\TestCase;
use robertobadjio\medical\entities\Client\ClientId;
use robertobadjio\medical\entities\Name;
use robertobadjio\medical\entities\Client\Phone;
use robertobadjio\medical\entities\Client\Phones;
use robertobadjio\medical\repositories\MemoryClientRepository;
use robertobadjio\medical\repositories\NotFoundException;
use robertobadjio\medical\tests\unit\entities\Client\ClientBuilder;

/**
 * Class BaseRepositoryTest
 * @package robertobadjio\medical\tests\unit\repositories
 */
abstract class BaseRepositoryTest extends TestCase
{
    /**
     * @var MemoryClientRepository
     */
    protected $repository;

    /**
     * BaseRepositoryTest constructor
     *
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->repository = new MemoryClientRepository();
    }

    /**
     * @throws \Exception
     */
    public function testGet()
    {
        $this->repository->add($employee = ClientBuilder::instance()->build());
        $found = $this->repository->get($employee->getId());
        $this->assertNotNull($found);
        $this->assertEquals($employee->getId(), $found->getId());
    }

    public function testGetNotFound()
    {
        $this->expectException(NotFoundException::class);
        $this->repository->get(new ClientId(25));
    }

    /**
     * @throws \Exception
     */
    public function testAdd()
    {
        $client = ClientBuilder::instance()
            ->withPhones([
                new Phone(7, '888', '00000001'),
                new Phone(7, '888', '00000002'),
            ])
            ->build();
        $this->repository->add($client);
        $found = $this->repository->get($client->getId());
        $this->assertEquals($client->getId(), $found->getId());
        $this->assertEquals($client->getName(), $found->getName());
        $this->assertEquals($client->getAddress(), $found->getAddress());
        $this->assertEquals(
            $client->getCreateDate()->getTimestamp(),
            $found->getCreateDate()->getTimestamp()
        );
        $this->checkPhones($client->getPhones(), $found->getPhones());
    }

    /**
     * @throws \Exception
     */
    public function testSave()
    {
        $employee = ClientBuilder::instance()
            ->withPhones([
                new Phone(7, '888', '00000001'),
                new Phone(7, '888', '00000002'),
            ])
            ->build();
        $this->repository->add($employee);
        $edit = $this->repository->get($employee->getId());
        $edit->rename($name = new Name('New', 'Test', 'Name'));
        $edit->addPhone($phone = new Phone(7, '888', '00000003'));
        $this->repository->save($edit);
        $found = $this->repository->get($employee->getId());
        $this->assertTrue($found->isActive());
        $this->assertEquals($name, $found->getName());
        $this->checkPhones($edit->getPhones(), $found->getPhones());
    }

    /**
     * @throws \Exception
     */
    public function testRemove()
    {
        $employee = ClientBuilder::instance()->withId(5)->build();
        $this->repository->add($employee);
        $this->repository->remove($employee);
        $this->expectException(NotFoundException::class);
        $this->repository->get(new ClientId(5));
    }

    /**
     * @param Phones $expected
     * @param Phones $actual
     */
    private function checkPhones(Phones $expected, Phones $actual)
    {
        $phoneData = function (Phone $phone) {
            return $phone->getFull();
        };

        $this->assertEquals(
            array_map($phoneData, $expected->getAll()),
            array_map($phoneData, $actual->getAll())
        );
    }
}

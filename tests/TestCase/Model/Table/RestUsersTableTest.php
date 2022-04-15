<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RestUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RestUsersTable Test Case
 */
class RestUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RestUsersTable
     */
    public $RestUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rest_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RestUsers') ? [] : ['className' => RestUsersTable::class];
        $this->RestUsers = TableRegistry::get('RestUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RestUsers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
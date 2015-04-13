<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
    public function setUp()
    {
        parent::setUp();


        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'harakiri',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

// Set the event dispatcher used by Eloquent models... (optional)


        $capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();

    }

	public function testBasicExample()
	{
		$crawler = $this->call('GET', '/');

		$this->assertResponseOk();
	}

    public function testBasicExample2()
    {
        $crawler = $this->call('GET', 'admin');

        $this->assertResponseOk();
    }

}
<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Contracts\Console\Kernel;
use Carbon\Carbon;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
	use DatabaseTransactions;
    // use WithoutMiddleware;
    // use DatabaseMigrations;

    protected $baseUrl = 'http://localhost';//localhost:8000

    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();
        return $app;
    }

    public function setUp()
    {
        parent::setUp();
        // reload session
        // \Laravel\Session::load();
        Artisan::call('migrate');
        // Artisan::call('migrate:reset');
        // Artisan::call('db:seed', array('--class'=>'TestingDatabaseSeeder'));
        Mail::pretend(true);
          // View::addLocation(dirname(__DIR__).'/fixtures/views');
        $this->mock('Way\Storage\Post\PostRepositoryInterface');
    }

    public function tearDown()
    {
        parent::tearDown();
        Mockery::close();
    }

    public function mock($class)
      {
          $repo = Mockery::mock('PostInterface');
          $repo->shouldReceive('getAll')->once()->andReturn('foo');
          $this->app->instance('PostInterface', $repo);
          return $mock;
      }
}

//         $json = json_decode( $response->getContent(), true );
    //     $params = ['site' => 'unittest', 'resource' => 'product', 'id' => '0'];

//         $id = $json['data']['attributes']['product.stock.warehouse.id'];
//         $ids = array( $json['data'][0]['attributes']['product.stock.warehouse.id'], $json['data'][1]['attributes']['product.stock.warehouse.id'] );

//         $content = '{"data":[
//             {"type":"product/stock/warehouse","attributes":{"product.stock.warehouse.code":"laravel","product.stock.warehouse.label":"laravel"}},
//             {"type":"product/stock/warehouse","attributes":{"product.stock.warehouse.code":"laravel2","product.stock.warehouse.label":"laravel"}}
//         ]}';

//         $getParams = ['filter' => ['&&' => [
//             ['=~' => ['product.stock.warehouse.code' => 'laravel']],
//             ['==' => ['product.stock.warehouse.label' => 'laravel2']]
//             ]],
//             'sort' => 'product.stock.warehouse.code', 'page' => ['offset' => 0, 'limit' => 3]
//         ];

    //     $response = $this->action('GET', '\Aimeos\Shop\Controller\CheckoutController@updateAction', ['site' => 'unittest'], ['code' => 'paypalexpress']);
    //     $response = $this->action('OPTIONS', '\Aimeos\Shop\Controller\JsonadmController@optionsAction', $params);
//         $response = $this->action('PATCH', '\Aimeos\Shop\Controller\JsonadmController@patchAction', $params, [], [], [], [], $content);
//         $response = $this->action('POST', '\Aimeos\Shop\Controller\JsonadmController@postAction', $params, [], [], [], [], $content);
//         $response = $this->action('GET', '\Aimeos\Shop\Controller\JsonadmController@getAction', $params, $getParams);
//         $response = $this->action('DELETE', '\Aimeos\Shop\Controller\JsonadmController@deleteAction', $params, [], [], [], [], $content);
//         $response = $this->action('PUT', '\Aimeos\Shop\Controller\JsonadmController@postAction', $params, [], [], [], [], $content);


            // ->assertResponseStatus($code);                                      = Assert that the client response has a given code.

            // ->assertViewHas($key, $value = null);                               = Assert that the response view has a given piece of bound data.
            // ->assertViewHasAll(array $bindings);                                = Assert that the view has a given list of bound data.
            // ->assertViewMissing($key);                                          = Assert that the response view is missing a piece of bound data.

            // ->assertRedirectedTo($uri, $with              = []);                = Assert whether the client was redirected to a given URI.
            // ->assertRedirectedToRoute($name, $parameters  = [], $with = []);    = Assert whether the client was redirected to a given route.
            // ->assertRedirectedToAction($name, $parameters = [], $with = []);    = Assert whether the client was redirected to a given action.

            // ->assertSessionHas($key, $value               = null);              = Assert that the session has a given value.
            // ->assertSessionHasAll(array $bindings);                             = Assert that the session has a given list of values.
            // ->assertSessionHasErrors($bindings[], $format = null);              = Assert that the session has errors bound.
            // ->assertHasOldInput();                                              = Assert that the session has old input.


    //     $this->assertEquals('', $response->getContent());
    //     $this->assertEquals( 401, $response->getStatusCode() );

//         $this->assertNotNull( $json );
//         $this->assertArrayHasKey( 'resources', $json['meta'] );
//         $this->assertGreaterThan( 1, count( $json['meta']['resources'] ) );
    //     $this->assertResponseOk();
    //     $this->assertContains('<section class="aimeos basket-related">', $response->getContent());
    //     $this->assertRegexp('#{.*}#smu', $response->getContent());


// ==========================================================


    //  public function call($destination, $parameters = [, $method = 'GET')
    // {
    //     $old_method = Request::foundation()->getMethod();
    //     \Laravel\Request::foundation()->setMethod($method);
    //     $response = Controller::call($destination, $parameters);
    //     Request::foundation()->setMethod($old_method);
    //     return $response;
    // }

    // public function get($destination, $parameters = [])
    // {
    //     return $this->call($destination, $parameters, 'GET');
    // }


    // public function post($destination, $post_data, $parameters = [])
    // {
    //     //clear request
    //     $request = \Laravel\Request::foundation()->request;
    //     foreach ($request->keys() as $key)
    //     {
    //         $request->remove($key);
    //     }

    //     \Laravel\Request::foundation()->request->add($post_data);
    //     return $this->call($destination, $parameters, 'POST');
    // }


    // public function __call($method, $args)
    // {
    //     if (in_array($method, ['get', 'post', 'put', 'patch', 'delete']))
    //     {
    //         return $this->call($method, $args[0]);
    //     }
     
    //     throw new BadMethodCallException;
    // }


// ==========================================================



    // public function assertRequestOk()
    // {
    //     $this->assertTrue($this->client->getReponse()->ok);
    // }

    // public function assertViewReceives($property, $value = null)
    // {
    //     $response = $this->client->getReponse();
    //     $property = $response->original->$property;

    //     if($value){ return $this->assertEquals($value, $property)}
    //     $this->assertTrue(!! $property);
    // }

    // public function assertRedirectTo($url)
    // {
    //     $response = $this->client->getReponse();
    //     $redirectTo = $response->headers->get('Location');
    // }
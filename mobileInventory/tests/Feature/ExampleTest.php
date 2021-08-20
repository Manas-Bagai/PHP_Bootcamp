<?php

namespace Tests\Feature;

use Database\Seeders\UsersTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_users(){
        (new UsersTableSeeder)->run();
        $response=$this->get('http://localhost:8000/api/user');
        $response->assertStatus(200);
    }

    public function test_get_users_by_name(){
        (new UsersTableSeeder)->run();
        $response=$this->get('http://localhost:8000/api/user/name/Administrator');
        $response->assertStatus(200);
    }

    public function test_get_users_by_email(){
        (new UsersTableSeeder)->run();
        $response=$this->get('http://localhost:8000/api/user/email/admin@test.com');
        $response->assertStatus(200);
    }

    public function test_get_users_by_moble_number(){
        (new UsersTableSeeder)->run();
        $response=$this->get('http://localhost:8000/api/user/mobile_number/9998887777');
        $response->assertStatus(200);
    }

    public function test_create_users(){
        $response = $this->postJson('http://localhost:8000/api/user',['name'=>"Manas",'mobile_number'=>"9999999999", 'email'=>'manas@gmail.com']);
        $response->assertStatus(200);
    }

    public function test_delete_users_by_name(){
        (new UsersTableSeeder)->run();
        $response=$this->delete('http://localhost:8000/api/user/name/Administrator');
        $response->assertStatus(200);
    }

    public function test_delete_users_by_email(){
        (new UsersTableSeeder)->run();
        $response=$this->delete('http://localhost:8000/api/user/email/admin@test.com');
        $response->assertStatus(200);
    }

    public function test_delete_users_by_moble_number(){
        (new UsersTableSeeder)->run();
        $response=$this->delete('http://localhost:8000/api/user/mobile_number/9998887777');
        $response->assertStatus(200);
    }
}

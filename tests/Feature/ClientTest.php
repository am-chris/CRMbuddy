<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use App\Models\Client;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function userCanCreateClient()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->json('POST', route('clients.store'), [
                'name' => 'John Doe',
                'phone' => '+1 951-451-9999',
                'email' => 'john@gmail.com',
                'address' => '12345 Main St',
                'city' => 'Los Angeles',
                'state' => 'CA',
                'postal' => '12345',
                'country' => 'US',
            ]);

        $this->assertDatabaseHas('clients', [
            'name' => 'John Doe',
            'phone' => '+1 951-451-9999',
            'email' => 'john@gmail.com',
            'address' => '12345 Main St',
            'city' => 'Los Angeles',
            'state' => 'CA',
            'postal' => '12345',
            'country' => 'US',
        ]);
    }

    /** @test */
    public function userCanEditClient()
    {
        $user = factory(User::class)->create();
        $client = factory(Client::class)->create(['name' => 'John Doe']);

        $this->actingAs($user)
            ->json('PUT', route('clients.update', $client->id), [
                'name' => 'Jane Doe',
            ]);

        $this->assertDatabaseHas('clients', [
            'name' => 'Jane Doe',
        ]);
    }

    /** @test */
    public function userCanDeleteClient() {
        $user = factory(User::class)->create();
        $client = factory(Client::class)->create(['name' => 'John Doe']);

        $this->assertDatabaseHas('clients', [
            'name' => 'John Doe',
        ]);

        $this->actingAs($user)
            ->json('DELETE', route('clients.destroy', $client->id));

        $this->assertDatabaseMissing('clients', [
            'name' => 'John Doe',
        ]);
    }
}

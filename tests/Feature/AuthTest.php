<?php

namespace Tests\Feature;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * Test case post has expected data in the Model fillable
     */
    public function check_user_not_logged_cant_see_data()
    {
        $response = $this->get('/api/paciente');

        $response->assertStatus(401);
    }

    /**
     * Test Integration
     * @test
     * Test case post has expected data in the Model fillable
     */
    public function check_user_logged_can_see_data()
    {
        $token = JWTAuth::fromUser(User::factory()->make());
        $response = $this->json(
                        'GET',
                            '/api/paciente',
                                [],
                                ['Authorization' => 'Bearer ' . $token]
                    )->assertStatus(200);
    }
}

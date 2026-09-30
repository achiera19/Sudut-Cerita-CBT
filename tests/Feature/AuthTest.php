<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Ruang BK');
        $response->assertSee('Masuk Akun');
    }

    public function test_users_can_authenticate_and_redirect_to_user_dashboard(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
            'password' => 'secret123',
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret123',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('user.dashboard'));
    }

    public function test_counselor_can_authenticate_and_redirect_to_counselor_dashboard(): void
    {
        $counselor = User::factory()->counselor()->create([
            'password' => 'secret123',
        ]);

        $response = $this->post('/login', [
            'email' => $counselor->email,
            'password' => 'secret123',
        ]);

        $this->assertAuthenticatedAs($counselor);
        $response->assertRedirect(route('counselor.dashboard'));
    }

    public function test_admin_can_authenticate_and_redirect_to_admin_dashboard(): void
    {
        $admin = User::factory()->admin()->create([
            'password' => 'secret123',
        ]);

        $response = $this->post('/login', [
            'email' => $admin->email,
            'password' => 'secret123',
        ]);

        $this->assertAuthenticatedAs($admin);
        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create([
            'password' => 'secret123',
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    public function test_unauthenticated_user_cannot_access_dashboard(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect(route('login'));
    }

    public function test_unauthorized_role_gets_403(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $response = $this->actingAs($user)->get('/admin/dashboard');

        $response->assertStatus(403);
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_accessing_login_is_redirected_to_dashboard(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect(route('user.dashboard'));
    }
}

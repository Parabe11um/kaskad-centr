<?php

namespace Tests\Feature;

use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPanelAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_admin_login(): void
    {
        $this->get('/admin')
            ->assertRedirect('/admin/login');
    }

    public function test_admin_and_editor_can_access_panel(): void
    {
        $panel = Filament::getPanel('admin');

        foreach ([User::ROLE_ADMIN, User::ROLE_EDITOR] as $role) {
            $user = User::factory()->make(['role' => $role]);
            $this->assertTrue($user->canAccessPanel($panel));
        }
    }

    public function test_regular_user_cannot_access_panel(): void
    {
        $panel = Filament::getPanel('admin');

        foreach ([User::ROLE_USER, 'user'] as $role) {
            $user = User::factory()->make(['role' => $role]);
            $this->assertFalse($user->canAccessPanel($panel));
        }
    }
}

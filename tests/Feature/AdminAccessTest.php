<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard_requires_login()
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('login'));
    }

    public function test_admin_can_access_dashboard()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get(route('admin.dashboard'));
        
        $response->assertStatus(200);
        $response->assertSee('Dashboard');
    }

    public function test_admin_can_access_posts_management()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get(route('admin.posts.index'));
        
        $response->assertStatus(200);
    }

    public function test_admin_can_access_training_management()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get(route('admin.trainings.index'));
        
        $response->assertStatus(200);
    }

    public function test_admin_can_access_job_vacancy_management()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get(route('admin.job-vacancies.index'));
        
        $response->assertStatus(200);
    }

    public function test_admin_can_access_user_management()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get(route('admin.users.index'));
        
        $response->assertStatus(200);
    }

    public function test_admin_can_access_heroes_management()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get(route('admin.heroes.index'));
        
        $response->assertStatus(200);
        $response->assertSee('badge_text');
    }

    public function test_unauthorized_user_cannot_access_menu_management()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get(route('admin.menus.index'));
        
        $response->assertStatus(403);
    }

    public function test_authorized_user_can_access_menu_management()
    {
        \Spatie\Permission\Models\Permission::create(['name' => 'manage-menus', 'guard_name' => 'web']);
        
        $user = User::factory()->create();
        $user->givePermissionTo('manage-menus');
        
        $response = $this->actingAs($user)->get(route('admin.menus.index'));
        
        $response->assertStatus(200);
    }
}

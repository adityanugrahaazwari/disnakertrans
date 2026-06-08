<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Post;
use App\Models\Training;
use App\Models\JobVacancy;
use App\Models\Category;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        
        \App\Models\Profile::create([
            'nama_dinas' => 'Disnakertrans Test',
            'visi' => 'Test Visi',
            'misi' => "Point 1\nPoint 2",
            'alamat' => 'Test Alamat',
            'email' => 'test@example.com',
            'telepon' => '123456',
            'footer_description' => 'Test Footer'
        ]);

        \App\Models\Department::create([
            'title' => 'Test Dept',
            'description' => 'Test Description',
            'icon' => 'fas fa-test',
            'color' => '#000000',
            'order' => 1,
            'is_active' => true,
            'url' => '#'
        ]);
    }

    public function test_home_page_is_accessible()
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
        $response->assertSee('DISNAKERTRANS');
    }

    public function test_profile_pages_are_accessible()
    {
        $routes = [
            'profile.vision',
            'profile.history',
            'profile.structure',
            'profile.maklumat'
        ];

        foreach ($routes as $routeName) {
            $response = $this->get(route($routeName));
            $response->assertStatus(200);
        }
    }

    public function test_news_index_and_show_are_accessible()
    {
        $this->withoutExceptionHandling();
        $category = Category::factory()->create();
        $post = Post::factory()->create([
            'category_id' => $category->id,
            'status' => 'published',
            'slug' => 'test-post'
        ]);

        $response = $this->get(route('posts.index'));
        $response->assertStatus(200);
        $response->assertSee($post->title);

        $response = $this->get(route('posts.show', 'test-post'));
        $response->assertStatus(200);
        $response->assertSee($post->title);
    }

    public function test_trainings_index_is_accessible()
    {
        $response = $this->get(route('trainings.index'));
        $response->assertStatus(200);
    }

    public function test_jobs_index_is_accessible()
    {
        $response = $this->get(route('jobs.index'));
        $response->assertStatus(200);
    }

    public function test_downloads_page_is_accessible()
    {
        $response = $this->get(route('downloads.index'));
        $response->assertStatus(200);
    }

    public function test_message_submission()
    {
        $response = $this->post(route('messages.store'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Aduan/Aspirasi Masyarakat',
            'message' => 'Hello, this is a test message.'
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('messages', [
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);
    }
}

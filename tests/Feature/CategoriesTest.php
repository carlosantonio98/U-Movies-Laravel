<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_authenticated_user_can_see_all_categories()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));
        
        $category = Category::factory()->create();

        $response = $this->get(route('admin.categories.index'));

        $response->assertSee($category->name);
    }

    public function test_authorized_user_can_see_all_categories()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $category = Category::factory()->create();

        $response = $this->get(route('admin.categories.index'));

        $response->assertSee($category->name);
    }
    
    public function test_inauthorized_user_cannot_see_all_categories()
    {
        $this->actingAs(User::factory()->create());

        $category = Category::factory()->create();

        $this->get(route('admin.categories.index'))->assertStatus(403);
    }

    public function test_unauthenticated_user_cannot_see_all_categories()
    {
        $response = $this->get(route('admin.categories.index'))
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_see_a_category()
    {
        $this->actingAs(User::factory()->create());

        $category = Category::factory()->create();

        $response = $this->get(route('admin.categories.show', $category->id));

        $response->assertSee($category->name)
            ->assertSee($category->slug);
    }

    public function test_unauthenticated_user_can_see_a_category()
    {
        $category = Category::factory()->create();

        $this->get(route('admin.categories.show', $category))
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_create_a_new_category()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $category = Category::factory()->make();

        $this->post(route('admin.categories.store'), $category->toArray());

        $this->assertEquals(1, Category::all()->count());
    }

    public function test_unauthenticated_users_cannot_create_a_new_category()
    {
        $category = Category::factory()->make();

        $this->post(route('admin.categories.store'), $category->toArray())
            ->assertRedirect(route('login'));
    }
    
    public function test_unauthorized_users_cannot_create_a_new_category()
    {
        $this->actingAs(User::factory()->create());
        
        $category = Category::factory()->make();

        $this->post(route('admin.categories.store'), $category->toArray())
            ->assertStatus(403);
    }

    public function test_a_category_requires_a_name()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));
        
        $category = Category::factory()->make(['name' => null]);

        $this->post(route('admin.categories.store'), $category->toArray())
            ->assertSessionHasErrors('name');
    }

    public function test_a_category_requires_a_slug()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $category = Category::factory()->make(['slug' => null]);

        $this->post(route('admin.categories.store'), $category->toArray())
            ->assertSessionHasErrors('slug');
    }

    public function test_authorized_user_can_update_the_category()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $category = Category::factory()->create();
        $category->name = 'Name updated';

        $this->put(route('admin.categories.update', $category), $category->toArray());

        $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'Name updated']);
    }

    public function test_unauthorized_user_cannot_update_the_category()
    {
        $this->actingAs(User::factory()->create());

        $category = Category::factory()->create();
        $category->name = "Name updated";

        $response = $this->put(route('admin.categories.update', $category), $category->toArray());
        $response->assertStatus(403);
    }

    public function test_a_category_requires_a_name_to_update()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $category = Category::factory()->create();
        $category->name = null;

        $this->put(route('admin.categories.update', $category), $category->toArray())
            ->assertSessionHasErrors('name');
    }

    public function test_a_category_requires_a_slug_to_update()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $category = Category::factory()->create();
        $category->slug = null;

        $this->put(route('admin.categories.update', $category), $category->toArray())
            ->assertSessionHasErrors('slug');
    }

    public function test_authorized_user_can_delete_the_category()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $category = Category::factory()->create();

        $this->delete(route('admin.categories.destroy', $category));

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function test_unauthorized_user_cannot_delete_the_category()
    {
        $this->actingAs(User::factory()->create());

        $category = Category::factory()->create();

        $response = $this->delete(route('admin.categories.destroy', $category));

        $response->assertStatus(403);
    }
}

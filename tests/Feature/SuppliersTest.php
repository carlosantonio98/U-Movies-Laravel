<?php

namespace Tests\Feature;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SuppliersTest extends TestCase
{
    use RefreshDatabase;

    public function test_authorized_user_can_see_all_suppliers()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $supplier = Supplier::factory()->create();

        $this->get(route('admin.suppliers.index'))
            ->assertSee($supplier->name);
    }

    public function test_unauthorized_user_cannot_see_all_suppliers()
    {
        $this->actingAs(User::factory()->create());

        Supplier::factory()->create();

        $this->get(route('admin.suppliers.index'))
            ->assertStatus(403);
    }

    public function test_authorized_user_can_see_a_supplier()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $supplier = Supplier::factory()->create();

        $this->get(route('admin.suppliers.show', $supplier))
            ->assertSee($supplier->name)
            ->assertSee($supplier->logo)
            ->assertSee($supplier->slug);
    }

    public function test_unauthorized_user_cannot_see_a_supplier()
    {
        $this->actingAs(User::factory()->create());

        $supplier = Supplier::factory()->create();

        $this->get(route('admin.suppliers.show', $supplier))
            ->assertStatus(403);
    }

    public function test_authorized_user_can_create_a_new_supplier()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        Storage::fake('public');
        $logo = UploadedFile::fake()->create('logos/image_one.jpg');

        $supplier = Supplier::factory()->make(['logo' => $logo]);

        // Check if directory is empty
        $this->assertEquals([], Storage::allFiles());

        $this->post(route('admin.suppliers.store'), $supplier->toArray());
        
        // Check if directory is not empty
        $this->assertNotEquals([], Storage::allFiles());

        $this->assertEquals(1, Supplier::all()->count());
    }

    public function test_unauthorized_user_cannot_create_a_new_supplier()
    {
        $this->actingAs(User::factory()->create());

        $supplier = Supplier::factory()->make();

        $this->post(route('admin.suppliers.store'), $supplier->toArray())
            ->assertStatus(403);
    }
    
    public function test_a_supplier_requires_a_name()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $supplier = Supplier::factory()->make(['name' => null]);

        $this->post(route('admin.suppliers.store'), $supplier->toArray())
            ->assertSessionHasErrors('name');
    }

    public function test_a_supplier_requires_a_slug()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $supplier = Supplier::factory()->make(['slug' => null]);

        $this->post(route('admin.suppliers.store'), $supplier->toArray())
            ->assertSessionHasErrors('slug');
    }
    
    public function test_a_supplier_requires_a_logo()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $supplier = Supplier::factory()->make(['logo' => null]);

        $this->post(route('admin.suppliers.store'), $supplier->toArray())
            ->assertSessionHasErrors('logo');
    }

    public function test_authorized_user_can_updated_supplier()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $supplier = Supplier::factory()->create();
        $supplier->name = 'Supplier edit';

        $this->put(route('admin.suppliers.update', $supplier), $supplier->toArray())
            ->assertRedirect(route('admin.suppliers.show', $supplier));
        
        $this->assertDatabaseHas('suppliers', ['id' => $supplier->id, 'name' => $supplier->name]);
    }
    
    public function test_unauthorized_user_cannot_update_supplier()
    {
        $this->actingAs(User::factory()->create());

        $supplier = Supplier::factory()->create();
        $supplier->name = 'Supplier edit';

        $this->put(route('admin.suppliers.update', $supplier), $supplier->toArray())
            ->assertStatus(403);
    }

    public function test_a_supplier_requires_a_name_update()
    {
        $this->actingAs(User::factory()->create(['email' => 'admin@admin.com']));

        $supplier = Supplier::factory()->create();
        $supplier->name = null;

        $this->put(route('admin.suppliers.update', $supplier), $supplier->toArray())
            ->assertSessionHasErrors('name');
    }
}

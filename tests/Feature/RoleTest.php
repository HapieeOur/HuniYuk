<?php

namespace Tests\Feature;

use App\Enums\RoleName;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_assign_roles_to_user_with_ulid(): void
    {
        // 1. Pastikan role dibuat dengan ULID
        $adminRole = Role::create(['name' => RoleName::ADMIN->value]);
        $ownerRole = Role::create(['name' => RoleName::OWNER_KOS->value]);
        $tenantRole = Role::create(['name' => RoleName::PENGHUNI_KOS->value]);

        $this->assertIsString($adminRole->id);
        $this->assertEquals(26, strlen($adminRole->id));

        // 2. Buat user
        $admin = User::factory()->create();
        $owner = User::factory()->create();
        $tenant = User::factory()->create();

        $this->assertIsString($admin->id);
        $this->assertEquals(26, strlen($admin->id));

        // 3. Assign role
        $admin->assignRole(RoleName::ADMIN);
        $owner->assignRole(RoleName::OWNER_KOS);
        $tenant->assignRole(RoleName::PENGHUNI_KOS);

        // 4. Assertion
        $this->assertTrue($admin->hasRole(RoleName::ADMIN));
        $this->assertFalse($admin->hasRole(RoleName::PENGHUNI_KOS));

        $this->assertTrue($owner->hasRole(RoleName::OWNER_KOS));
        $this->assertTrue($tenant->hasRole(RoleName::PENGHUNI_KOS));
    }
}

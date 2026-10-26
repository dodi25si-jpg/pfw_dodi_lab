<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserCrudTest extends TestCase
{
    use RefreshDatabase;

    private function validPayload(array $override = []): array
    {
        return array_merge([
            'name'                  => 'Budi Santoso',
            'email'                 => 'budi@example.com',
            'password'              => 'rahasia123',
            'password_confirmation' => 'rahasia123',
        ], $override);
    }

    public function test_index_menampilkan_daftar_user(): void
    {
        User::factory()->create(['name' => 'Siti Aminah']);

        $this->get(route('user.index'))
            ->assertOk()
            ->assertSee('Siti Aminah');
    }

    public function test_store_menyimpan_user_dengan_password_ter_hash_dan_redirect_dengan_flash(): void
    {
        $this->post(route('user.store'), $this->validPayload())
            ->assertRedirect(route('user.index'))
            ->assertSessionHas('success');

        $user = User::where('email', 'budi@example.com')->firstOrFail();
        $this->assertNotSame('rahasia123', $user->password);
        $this->assertTrue(Hash::check('rahasia123', $user->password));
    }

    public function test_store_gagal_validasi_dan_form_ter_repopulate(): void
    {
        $this->from(route('user.create'))
            ->post(route('user.store'), $this->validPayload([
                'password'              => 'pendek',
                'password_confirmation' => 'beda',
            ]))
            ->assertRedirect(route('user.create'))
            ->assertSessionHasErrors('password')
            ->assertSessionHasInput('name', 'Budi Santoso');

        $this->assertDatabaseCount('users', 0);

        $this->get(route('user.create'))->assertOk();
    }

    public function test_store_menolak_email_duplikat(): void
    {
        User::factory()->create(['email' => 'budi@example.com']);

        $this->post(route('user.store'), $this->validPayload())
            ->assertSessionHasErrors('email');
    }

    public function test_update_tanpa_password_tidak_mengubah_password_lama(): void
    {
        $user = User::factory()->create(['password' => Hash::make('lama12345')]);

        $this->put(route('user.update', $user->id), [
            'name'  => 'Nama Baru',
            'email' => $user->email, // email sendiri tidak dianggap duplikat
        ])->assertRedirect(route('user.index'))
          ->assertSessionHas('success');

        $user->refresh();
        $this->assertSame('Nama Baru', $user->name);
        $this->assertTrue(Hash::check('lama12345', $user->password));
    }

    public function test_update_dengan_password_baru_meng_hash_ulang(): void
    {
        $user = User::factory()->create();

        $this->put(route('user.update', $user->id), [
            'name'                  => $user->name,
            'email'                 => $user->email,
            'password'              => 'baru12345',
            'password_confirmation' => 'baru12345',
        ])->assertRedirect(route('user.index'));

        $this->assertTrue(Hash::check('baru12345', $user->refresh()->password));
    }

    public function test_edit_menampilkan_data_user(): void
    {
        $user = User::factory()->create(['name' => 'Edit Saya']);

        $this->get(route('user.edit', $user->id))
            ->assertOk()
            ->assertSee('Edit Saya');
    }

    public function test_destroy_menghapus_user(): void
    {
        $user = User::factory()->create();

        $this->delete(route('user.destroy', $user->id))
            ->assertRedirect(route('user.index'))
            ->assertSessionHas('success');

        $this->assertModelMissing($user);
    }
}

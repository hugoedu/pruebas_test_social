<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateStatusTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function usuario_invitado_no_puede_crear_estados()
    {
        $response = $this->postJson(route('statuses.store'),['body'=>'Mi primer status']);
        $response->assertRedirect("login");
    }


    /** @test */
    public function usuario_autenticado_puede_crear_estados()
    {
        $this->withoutExceptionHandling();

        // 1. Given => teniendo un usuario autenticado
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // 2. when => cuando hace un post request a status
        $response = $this->postJson(route('statuses.store'),['body'=>'Mi primer status']);
        $response->assertJson([
            "body"=>'Mi primer status'
        ]);

        // 3. then => entonces veo un nuevo estado en la base de datos
        $this->assertDatabaseHas('statuses',[
            'user_id'=>$user->id,
            'body'=>'Mi primer status'
        ]);

    }

    /** @test */
    public function estatus_requiere_cuerpo()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->postJson(route('statuses.store'),['body'=>'']);

        $response->assertJsonStructure([
            'message','errors'=>['body']
        ]);
    }
}

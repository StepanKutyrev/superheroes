<?php

namespace Tests\Unit;

use App\Models\Superhero;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class SuperheroControllerTest extends TestCase
{
    public function test_index()
    {
        $response = $this->get('/superhero');
        $response->assertSeeText('Nickname');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $stub = __DIR__ . '/stubs/test.jpg';
        $name = uniqid() . '.jpg';
        $path = sys_get_temp_dir() . '/' . $name;
        copy($stub, $path);

        $file = new UploadedFile($path, $name, 'image/jpg', null, true);

        $nickname           = 'nickname' . uniqid();
        $origin_description = 'origin_description';
        $superpowers        = 'superpowers';
        $catch_phrase       = 'catch_phrase';
        $real_name          = 'real_name';

        $response = $this->post('/superhero', [
            'nickname'           => $nickname,
            'origin_description' => $origin_description,
            'superpowers'        => $superpowers,
            'catch_phrase'       => $catch_phrase,
            'real_name'          => $real_name,
            'image'              => $file,
        ]);

        $response->assertStatus(302);
        /** @var Superhero $superhero */
        $superhero = Superhero::query()->where('nickname', '=', $nickname)->first();
        $this->assertInstanceOf(Superhero::class, $superhero);

        $this->assertEquals($origin_description, $superhero->origin_description);
        $this->assertEquals($superpowers, $superhero->superpowers);
        $this->assertEquals($catch_phrase, $superhero->catch_phrase);
        $this->assertEquals($real_name, $superhero->real_name);
    }

    public function test_delete()
    {
        $superhero = Superhero::factory()->make();
        $id = $superhero->id;

//        $response = $this->post("/superhero/{$id}", [
//            '_method' => 'DELETE',
//            '_token' => csrf_token()
//        ]);

//        $response = $this->delete("/superhero/{$id}", [
//            '_method' => 'DELETE'
//        ]);

//        $response->assertStatus(302);
//        $response->assertRedirect('/superhero');

        $superhero = Superhero::query()->find($id);

        $this->assertNull($superhero);
    }
}

<?php

declare(strict_types=1);

namespace Link\UI;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase;

class LinkControllerTest extends TestCase
{
    public function createApplication()
    {
        $app = require __DIR__ . '/../../../../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function testGetLink(): void
    {
        $response = $this->post('api/geturl/', ['url' => 'https://www.google.com/']);

        $response->assertOk();
    }

    public function testGetLinkFail(): void
    {
        $response = $this->post('api/geturl/', []);

        $response->assertStatus(422);
    }
}

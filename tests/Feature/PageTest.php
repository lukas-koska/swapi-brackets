<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * A basic test for pages.
     *
     * @return void
     */
    public function test_pages()
    {
        $languageSlug = 'sk';
        $pages = [
            '',
            '/planets',
            '/logs',
        ];

        foreach ($pages as $page) {
            $response = $this->get('/' . $languageSlug . $page);
            $response->assertStatus(200);
        }
    }

    public function test_logs()
    {
        $data = [
            'mood' => 'good',
            'weather' => 'sunny',
            'gps' => '',
            'note' => 'Note for tests',
        ];

        Session::start();
        $response = $this->call('POST', 'api/log', $data);
        $this->assertEquals(302, $response->getStatusCode());

        $this->assertDatabaseMissing('user_logs', $data);

    }
}

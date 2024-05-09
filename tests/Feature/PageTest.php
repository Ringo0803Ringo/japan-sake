<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * ステータスコードのテスト
     * 200 成功
     * 300 リダイレクト
     * 400 クライアントエラー
     * 500 サーバーエラー
     *
     * @return void
     */
}

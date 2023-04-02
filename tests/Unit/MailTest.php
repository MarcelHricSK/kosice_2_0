<?php

namespace Tests\Unit;

use App\Models\Language;
use Tests\TestCase;

class MailTest extends TestCase
{
    public function test_views_exists()
    {
        foreach (Language::all() as $lang) {
            $this->assertTrue(view()->exists('email.' . $lang->code . '.offer.created'));
            $this->assertTrue(view()->exists('email.' . $lang->code . '.offer_order.created'));
        }
    }
}

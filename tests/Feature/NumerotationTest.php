<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\lib\NumerotationConverter;

class NumerotationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testConverterReturnsString()
    {
        $numC  = new  NumerotationConverter;
        $this->assertIsString($numC->convert("<doc><aa><cmp>", 'App\Facture', 3, 3));
    }

    public function testConverterReturnsExpectedValue()
    {
        $numC  = new  NumerotationConverter;
        $this->assertEquals("F20003", $numC->convert("<doc><aa><cmp>", 'App\Facture', 3, 3));
        $this->assertEquals("F2020003", $numC->convert("<doc><aaaa><cmp>", 'App\Facture', 3, 3));
        // $this->assertEquals("F30003", $numC->convert("<doc><j><cmp>", 'App\Facture', 3, 3));
        $this->assertEquals("F:20-003", $numC->convert("<doc>:<aa>-<cmp>", 'App\Facture', 3, 3));
        $this->assertEquals("F:04-003", $numC->convert("<doc>:<m>-<cmp>", 'App\Facture', 3, 3));
        $this->assertEquals("F:04-003", $numC->convert("<doc>:<mm>-<cmp>", 'App\Facture', 3, 3));
        $this->assertEquals("F:30-003", $numC->convert("<doc>:<jj>-<cmp>", 'App\Facture', 3, 3));
        $this->assertEquals("F:30-003", $numC->convert("<doc>:<j>-<cmp>", 'App\Facture', 3, 3));
        $this->assertEquals("F20<cmp", $numC->convert("<doc><aa><cmp", 'App\Facture', 3, 3));
    }
}

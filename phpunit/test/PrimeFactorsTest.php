<?php

namespace test;

include '../src/PrimeFactors.php';

use App\PrimeFactors;
use Tests\TestCase;

class PrimeFactorsTest extends TestCase
{
    /** @test */
    public function it_return_factors_for_1()
    {
        $this->assertEquals([], PrimeFactors::generate(1));
    }

    /** @test */
    public function it_returns_factors_for_2()
    {
        $this->assertEquals([2], PrimeFactors::generate(2));
    }

    /** @test */
    public function it_returns_factors_for_3()
    {
        $this->assertEquals([3], PrimeFactors::generate(3));
    }

    /** @test */
    public function it_returns_factors_for_4()
    {
        $this->assertEquals([2, 2], PrimeFactors::generate(4));
    }

    /** @test */
    public function it_returns_factors_for_5()
    {
        $this->assertEquals([5], PrimeFactors::generate(5));
    }
    /** @test */
    public function it_returns_factors_for_10()
    {
        $this->assertEquals([2, 5], PrimeFactors::generate(10));
    }

    /** @test */
    public function it_returns_factors_for_24()
    {
        $this->assertEquals([2, 2, 2, 3], PrimeFactors::generate(24));
    }
}

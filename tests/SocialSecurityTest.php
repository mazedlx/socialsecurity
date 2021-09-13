<?php

use Mazedlx\SocialSecurity\SocialSecurity;
use PHPUnit\Framework\TestCase;

class SocialSecurityTest extends TestCase
{
    /**
     * @test
     */
    public function it_validates_social_security_numbers()
    {
        $socialSecurity = new SocialSecurity('199102399');

        $this->assertTrue($socialSecurity->isValid());
    }

    /**
     * @test
     */
    public function it_ignores_whitespace_characters()
    {
        $socialSecurity = new SocialSecurity('1991 02 03 99');

        $this->assertTrue($socialSecurity->isValid());
    }

    /**
     * @test
     */
    public function it_accepts_numbers()
    {
        $socialSecurity = new SocialSecurity(1991020399);

        $this->assertTrue($socialSecurity->isValid());
    }

    /**
     * @test
     */
    public function it_fails_validation_for_invalid_socual_security_numbers()
    {
        $socialSecurity = new SocialSecurity('not-valid');

        $this->assertFalse($socialSecurity->isValid());
    }
}

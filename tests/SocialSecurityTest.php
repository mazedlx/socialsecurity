<?php


use Mazedlx\SocialSecurity\SocialSecurity;
use PHPUnit\Framework\TestCase;

class SocialSecurityTest extends TestCase
{
    public function testItValidatesSocialSecurityNumbers()
    {
        $socialSecurity = new SocialSecurity('1111111111');

        $this->assertTrue($socialSecurity->isValid());
    }

    public function testItIgnoresWhitespaceCharacters()
    {
        $socialSecurity = new SocialSecurity('1111 11 11 11');

        $this->assertTrue($socialSecurity->isValid());
    }

    public function testItAcceptsNumbers()
    {
        $socialSecurity = new SocialSecurity(1111111111);

        $this->assertTrue($socialSecurity->isValid());
    }

    public function testItFailsValidationForInvalidSocualSecurityNumbers()
    {
        $socialSecurity = new SocialSecurity('not-valid');

        $this->assertFalse($socialSecurity->isValid());
    }
}

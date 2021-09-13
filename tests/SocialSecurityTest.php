<?php


use Mazedlx\SocialSecurity\SocialSecurity;
use PHPUnit\Framework\TestCase;

class SocialSecurityTest extends TestCase
{
    public function testItValidatesSocialSecurityNumbers()
    {
        $socialSecurity = new SocialSecurity('199102399');

        $this->assertTrue($socialSecurity->isValid());
    }

    public function testItIgnoresWhitespaceCharacters()
    {
        $socialSecurity = new SocialSecurity('1991 02 03 99');

        $this->assertTrue($socialSecurity->isValid());
    }

    public function testItAcceptsNumbers()
    {
        $socialSecurity = new SocialSecurity(1991020399);

        $this->assertTrue($socialSecurity->isValid());
    }

    public function testItFailsValidationForInvalidSocualSecurityNumbers()
    {
        $socialSecurity = new SocialSecurity('not-valid');

        $this->assertFalse($socialSecurity->isValid());
    }
}

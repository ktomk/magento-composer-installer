<?php
/**
 * Created by JetBrains PhpStorm.
 * User: spies
 * Date: 27.10.12 (43 KW)
 * Time: 17:19
 * To change this template use File | Settings | File Templates.
 */
namespace MagentoHackathon\Composer\Magento\Deploystrategy;
use org\bovigo\vfs\vfsStream;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-10-27 at 15:56:01.
 */
class SymlinkTest extends DeploystrategyAbstractTest
{
    /**
     * @return DeploystrategyAbstract
     */
    public function getTestDeployStrategy($dest, $src)
    {
        return new Symlink($dest, $src);
    }

    /**
     *
     */
    public function testCreate()
    {
        $src = 'local.xml';
        $dest = 'local2.xml';
        touch($this->sourceDir . DIRECTORY_SEPARATOR . $src);
        $this->assertTrue(is_readable($this->sourceDir . DIRECTORY_SEPARATOR . $src));
        $this->assertFalse(is_readable($this->destDir . DIRECTORY_SEPARATOR . $dest));
        $this->strategy->create($src, $dest);
        $this->assertTrue(is_readable($this->destDir . DIRECTORY_SEPARATOR . $dest));
    }

    public function testClean()
    {
        $src = 'local.xml';
        $dest = 'local2.xml';
        touch($this->sourceDir . DIRECTORY_SEPARATOR . $src);
        $this->assertTrue(is_readable($this->sourceDir . DIRECTORY_SEPARATOR . $src));
        $this->assertFalse(is_readable($this->destDir . DIRECTORY_SEPARATOR . $dest));
        $this->strategy->create($src, $dest);
        $this->assertTrue(is_readable($this->destDir . DIRECTORY_SEPARATOR . $dest));
        unlink($this->destDir . DIRECTORY_SEPARATOR . $dest);
        $this->strategy->clean($this->destDir . DIRECTORY_SEPARATOR . $dest);
        $this->assertFalse(is_readable($this->destDir . DIRECTORY_SEPARATOR . $dest));
    }

}
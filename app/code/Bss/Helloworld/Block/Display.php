<?php
declare(strict_types=1);

namespace Bss\Helloworld\Block;

use Magento\Framework\View\Element\Template;

/**
 * Block Display
 * Get data from Controller
 */
class Display extends Template
{
    /**
     * Get name
     *
     * @return void
     */
    public function getName()
    {
        $this->getData('name');
    }

    /**
     * Get Dob
     *
     * @return void
     */
    public function getDob()
    {
        $this->getData('dob');
    }

    /**
     *  Get Address
     *
     * @return void
     */
    public function getAddress()
    {
        $this->getData('address');
    }

    /**
     *  Get Description
     *
     * @return void
     */
    public function getDescription()
    {
        $this->getData('description');
    }
}

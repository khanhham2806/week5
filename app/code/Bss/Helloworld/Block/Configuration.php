<?php
declare(strict_types=1);

namespace Bss\Helloworld\Block;

use Magento\Framework\View\Element\Template;

/**
 * Block Display
 * Get data from Controller
 */
class Configuration extends Template
{
    /**
     * Get PageTitle
     *
     * @return void
     */
    public function getPageTitle()
    {
        $this->getData('page_title');
    }

    /**
     * Get PageDescription
     *
     * @return void
     */
    public function getPageDescription()
    {
        $this->getData('page_description');
    }
}

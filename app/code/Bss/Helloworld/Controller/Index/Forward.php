<?php
declare(strict_types=1);

namespace Bss\Helloworld\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\ForwardFactory;

/**
 * Class Forward
 * go to cms_index_index (homepage)
 */
class Forward implements HttpGetActionInterface
{
    /**
     * @var ForwardFactory
     */
    private $forwardFactory;
    /**
     * @param ForwardFactory $forwardFactory
     */
    public function __construct(ForwardFactory $forwardFactory)
    {
        $this->forwardFactory = $forwardFactory;
    }

    /**
     * Excute method
     */
    public function execute()
    {
        $result = $this->forwardFactory->create();
        $result->setModule('cms');
        $result->setController('index');
        $result->forward('index');

        return $result;
    }
}

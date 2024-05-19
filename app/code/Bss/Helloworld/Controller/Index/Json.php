<?php
declare(strict_types=1);

namespace Bss\Helloworld\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;

/**
 * Class Json
 * class return JSON use JsonFactory
 */
class Json implements HttpGetActionInterface
{
    /**
     * @var JsonFactory
     */
    private $jsonFactory;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @param JsonFactory $jsonFactory
     * @param RequestInterface $request
     */
    public function __construct(JsonFactory $jsonFactory, RequestInterface $request)
    {
        $this->jsonFactory = $jsonFactory;
        $this->request = $request;
    }

    /**
     * Excute method
     */
    public function execute()
    {
        $name = $this->request->getParam('name', 'Khanh');
        $dob = $this->request->getParam('dob', '28-06-2001');
        $address = $this->request->getParam('address', '83 Tran Duy Hung');
        $description = $this->request->getParam('description', 'Description');
        $data = ['name'=> __($name),'dob'=> __($dob),'address'=> __($address), 'description'=> __($description)];

        $result = $this->jsonFactory->create();
        $result->setData($data);

        return $result;
    }
}

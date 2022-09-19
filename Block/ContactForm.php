<?php

declare(strict_types=1);

namespace EVGV\Contact\Block;

use Magento\Framework\View\Element\Template;
use EVGV\Contact\Model\Config;

class ContactForm extends Template
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @param Template\Context $context
     * @param Config $config
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Config $config,
        array $data = []
    ){
        $this->config = $config;
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
    }

    /**
     * Returns action url for contact form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('contact/index/post', ['_secure' => true]);
    }

    /**
     * Added Page Title, Meta Title and Description
     *
     * @return ContactForm
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareLayout()
    {
        $pageTitle = $this->config->getContactPageTitle();
        if ($pageTitle) {
            $this->pageConfig->getTitle()->set($pageTitle);
        }

        $metaTitle = $this->config->getContactPageMetaTitle();
        if ($metaTitle) {
            $this->pageConfig->setMetaTitle($metaTitle);
        }

        $metaDescription = $this->config->getContactPageMetaDescription();
        if ($metaDescription) {
            $this->pageConfig->setDescription($metaDescription);
        }

        return parent::_prepareLayout();
    }
}

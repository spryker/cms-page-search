<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CmsPageSearch\Business;

use Spryker\Zed\CmsPageSearch\Business\Search\CmsPageSearchWriter;
use Spryker\Zed\CmsPageSearch\Business\Search\DataMapper\CmsPageSearchDataMapper;
use Spryker\Zed\CmsPageSearch\Business\Search\DataMapper\CmsPageSearchDataMapperInterface;
use Spryker\Zed\CmsPageSearch\CmsPageSearchDependencyProvider;
use Spryker\Zed\CmsPageSearch\Dependency\Facade\CmsPageSearchToLocaleFacadeInterface;
use Spryker\Zed\CmsPageSearch\Dependency\Facade\CmsPageSearchToStoreFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Spryker\Zed\CmsPageSearch\CmsPageSearchConfig getConfig()
 * @method \Spryker\Zed\CmsPageSearch\Persistence\CmsPageSearchQueryContainerInterface getQueryContainer()
 */
class CmsPageSearchBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Spryker\Zed\CmsPageSearch\Business\Search\CmsPageSearchWriterInterface
     */
    public function createCmsPageSearchWriter()
    {
        return new CmsPageSearchWriter(
            $this->getQueryContainer(),
            $this->getCmsFacade(),
            $this->createCmsPageSearchDataMapper(),
            $this->getUtilEncoding(),
            $this->getLocaleFacade(),
            $this->getConfig()->isSendingToQueue(),
        );
    }

    /**
     * @return \Spryker\Zed\CmsPageSearch\Business\Search\DataMapper\CmsPageSearchDataMapperInterface
     */
    public function createCmsPageSearchDataMapper(): CmsPageSearchDataMapperInterface
    {
        return new CmsPageSearchDataMapper($this->getStoreFacade());
    }

    /**
     * @return \Spryker\Zed\CmsPageSearch\Dependency\Service\CmsPageSearchToUtilEncodingInterface
     */
    protected function getUtilEncoding()
    {
        return $this->getProvidedDependency(CmsPageSearchDependencyProvider::SERVICE_UTIL_ENCODING);
    }

    /**
     * @return \Spryker\Zed\CmsPageSearch\Dependency\Facade\CmsPageSearchToCmsInterface
     */
    protected function getCmsFacade()
    {
        return $this->getProvidedDependency(CmsPageSearchDependencyProvider::FACADE_CMS);
    }

    /**
     * @return \Spryker\Zed\CmsPageSearch\Dependency\Facade\CmsPageSearchToLocaleFacadeInterface
     */
    public function getLocaleFacade(): CmsPageSearchToLocaleFacadeInterface
    {
        return $this->getProvidedDependency(CmsPageSearchDependencyProvider::FACADE_LOCALE);
    }

    /**
     * @return \Spryker\Zed\CmsPageSearch\Dependency\Facade\CmsPageSearchToStoreFacadeInterface
     */
    public function getStoreFacade(): CmsPageSearchToStoreFacadeInterface
    {
        return $this->getProvidedDependency(CmsPageSearchDependencyProvider::FACADE_STORE);
    }
}

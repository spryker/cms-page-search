<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductAttributeGui\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\ProductAttributeGui\Business\Model\AttributeReader;
use Spryker\Zed\ProductAttributeGui\Business\Model\AttributeWriter;
use Spryker\Zed\ProductAttributeGui\Business\Model\ProductAttributeManager;
use Spryker\Zed\ProductAttributeGui\ProductAttributeGuiDependencyProvider;

/**
 * @method \Spryker\Zed\ProductAttributeGui\ProductAttributeGuiConfig getConfig()
 */
class ProductAttributeGuiBusinessFactory extends AbstractBusinessFactory
{

    /**
     * @return \Spryker\Zed\ProductAttributeGui\Business\Model\ProductAttributeManagerInterface
     */
    public function createProductAttributeManager()
    {
        return new ProductAttributeManager(
            $this->getProductQueryContainer(),
            $this->createAttributeReader(),
            $this->createAttributeWriter()
        );
    }

    /**
     * @return \Spryker\Zed\ProductAttributeGui\Business\Model\AttributeReaderInterface
     */
    public function createAttributeReader()
    {
        return new AttributeReader(
            $this->getProductManagementQueryContainer()
        );
    }

    /**
     * @return \Spryker\Zed\ProductAttributeGui\Business\Model\AttributeWriterInterface
     */
    public function createAttributeWriter()
    {
        return new AttributeWriter(
        );
    }

    /**
     * @return \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected function getProductQueryContainer()
    {
        return $this->getProvidedDependency(ProductAttributeGuiDependencyProvider::QUERY_CONTAINER_PRODUCT);
    }

    /**
     * @return \Spryker\Zed\ProductManagement\Persistence\ProductManagementQueryContainerInterface
     */
    protected function getProductManagementQueryContainer()
    {
        return $this->getProvidedDependency(ProductAttributeGuiDependencyProvider::QUERY_CONTAINER_PRODUCT_MANAGEMENT);
    }

}

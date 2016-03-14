<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductOptionDiscountConnector\Dependency\Facade;

use Spryker\Zed\Tax\Business\TaxFacade;

class ProductOptionDiscountConnectorToTaxBridge implements ProductOptionToTaxBridgeInterface
{

    /**
     * @var \Spryker\Zed\Tax\Business\TaxFacade
     */
    protected $taxFacade;

    /**
     * @param \Spryker\Zed\Tax\Business\TaxFacade $taxFacade
     */
    public function __construct($taxFacade)
    {
        $this->taxFacade = $taxFacade;
    }

    /**
     * @param int $grossPrice
     * @param float $taxRate
     *
     * @return int
     */
    public function getTaxAmountFromGrossPrice($grossPrice, $taxRate)
    {
        return $this->taxFacade->getTaxAmountFromGrossPrice($grossPrice, $taxRate);
    }

}
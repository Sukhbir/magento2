<?php
/**
 * Copyright © 2015 Td. All rights reserved.
 */

namespace Td\Abundantcart\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
	
        $installer = $setup;

        $installer->startSetup();

		/**
         * Create table 'abundantcart_index'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('abundantcart_index')
        )
		->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'abundantcart_index'
        )
		->addColumn(
            'email',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'Email'
        )
		->addColumn(
            'cus_coupon_code',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'cus_coupon_code'
        )
		->addColumn(
            'order_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'order_id'
        )
		// ->addColumn(
            // 'order_id',
            // \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            // null,
            // ['nullable' => false],
            // 'Order_id'
        // )
		->addColumn(
            'items',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'Items'
        )
		/*{{CedAddTableColumn}}}*/
		
		
        ->setComment(
            'Td Abundantcart abundantcart_index'
        );
		
		$installer->getConnection()->createTable($table);
		/*{{CedAddTable}}*/

        $installer->endSetup();

    }
}

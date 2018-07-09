<?php 

namespace OpenTechiz\Blog\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        // $conn = $installer->getConnection();
        // $tableName = $conn->getTableName("opentechiz_blog_comment");
        
        // if($conn->isTableExists($tableName) != true) {
        //     $table = $conn->newTable($installer->getTable('opentechiz_blog_comment'))
        //         ->addColumn(
        //             'comment_id',
        //             Table::TYPE_SMALLINT,
        //             null,
        //             ['identity' => true, 'nullable' => false, 'primary' => true],
        //             'Post ID'
        //         )
        //         ->addColumn('content', Table::TYPE_TEXT, 255, ['nullable' => false], 'Comment Content')
        //         ->addColumn('author', Table::TYPE_TEXT, 255, ['nullable' => false], 'Author Comment')
        //         ->addColumn('post_id', Table::TYPE_SMALLINT, null, ['nullable' => false], 'Post ID')
        //         ->addColumn('creation_time', Table::TYPE_DATETIME, null, [], 'Creation Time')
        //         ->setComment('Comment Table');

        //     $conn->createTable($table);   
        // } else {
        //     $installer->run("ALTER TABLE " . $tableName . " ADD COLUMN status SMALLINT");
        // }

        if (version_compare($context->getVersion(), '2.0.0') < 0) {
            $tableName = $setup->getTable('opentechiz_blog_comment');
            if ($setup->getConnection()->isTableExists($tableName) == true) {
        
                $columns = [
                    'status' => [
                        'type' => Table::TYPE_SMALLINT,
                        'nullable' => false,
                        'default' => 0,
                        'comment' => 'Status',
                    ],
                ];

                $connection = $setup->getConnection();
                foreach ($columns as $name => $definition) {
                    $connection->addColumn($tableName, $name, $definition);
                }

            }

        
        }
        $setup->endSetup();

    }
}

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
        $installer  = $setup;
        $installer->startSetup();
        // $setup->startSetup();
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

        // if (version_compare($context->getVersion(), '1.1.9') < 0) {
            // $tableName = $setup->getTable('opentechiz_blog_comment');
            // if ($setup->getConnection()->isTableExists($tableName) == true) {
        
            //     $columns = [
            //         'status' => [
            //             'type' => Table::TYPE_SMALLINT,
            //             'nullable' => false,
            //             'default' => 0,
            //             'comment' => 'Status',
            //         ],
            //     ];

            //     $connection = $setup->getConnection();
            //     foreach ($columns as $name => $definition) {
            //         $connection->addColumn($tableName, $name, $definition);
            //     }

            // }

            // $conn = $installer->getConnection();
            // $tableName = $installer->getTable('opentechiz_blog_comment');
            // if ($installer->tableExists($tableName)) {
            //     // $installer->run('ALTER TABLE ' . $tableName . ' MODIFY post_id integer(10) auto_increment');
            //     $conn->addColumn($tableName, 'user_id', [
            //         'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            //         'size' => null,
            //         'nullable' => false,
            //         'comment' => 'User ID',
            //         'default' => 0,
            //         'after' => 'status'
            //     ]);

            // }

            // $conn = $installer->getConnection();
            // $tableName = $installer->getTable('opentechiz_blog_comment');
            // if ($installer->tableExists($tableName)) {
            //     $installer->run('ALTER TABLE ' . $tableName . ' MODIFY user_id integer(10) default 0 notnull');

            // }
        $table = $installer->getConnection()
            ->newTable($installer->getTable('opentechiz_blog_comment_approval_notification'))
            ->addColumn('noti_id', Table::TYPE_SMALLINT, null, [
               'identity' => true,
               'nullable' => false,
               'primary' => true,
            ], 'Noti ID')
            ->addColumn('content', Table::TYPE_TEXT, 255, ['nullable => false'], 'Notification Content')
            ->addColumn('user_id', Table::TYPE_SMALLINT, null, ['nullable' => false], 'User ID')
            ->addColumn('post_id', Table::TYPE_SMALLINT, null, ['nullable' => false], 'Post ID')
            ->addColumn('creation_time', Table::TYPE_TIMESTAMP, null, [], 'Comment Created At')
            ->setComment('Comment Notification');
        $installer->getConnection()->createTable($table);

        
        
        // $setup->endSetup();
        $installer->endSetup();

    }
}

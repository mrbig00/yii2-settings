<?php
/**
 * @copyright Copyright (c) 2017 Zoltán Szántó <mrbig00@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

use yii\db\Migration;

class m151126_091910_add_unique_index extends Migration
{
    public function safeUp()
    {
        $this->createIndex('settings_unique_key_section', '{{%settings}}', ['section', 'key'], true);
    }

    public function safeDown()
    {
        $this->dropIndex('settings_unique_key_section', '{{%settings}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cooperativa`.
 */
class m170315_111713_create_cooperativa_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cooperativa', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'municipio' => $this->string(),
            'contacto' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cooperativa');
    }
}

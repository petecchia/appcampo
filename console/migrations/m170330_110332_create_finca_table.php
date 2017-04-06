<?php

use yii\db\Migration;

/**
 * Handles the creation of table `finca`.
 */
class m170330_110332_create_finca_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {

        $this->createTable('comercializadora', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'municipio' => $this->string(),
            'contacto' => $this->string()
        ]);

        $this->createTable('producto', [
            'id'=> $this->integer(),
            'id_com'=>$this->integer(),
            'precio_com'=>$this->double(),
            'nombre'=>$this->string()->notNull()
        ]);

        $this->addPrimaryKey('pk_producto', 'producto', 'id');
        $this->addForeignKey('fk_prod_comercializadora', 'producto', 'id_com', 'comercializadora', 'id');

        $this->createTable('usuario', [
            'id_come'=>$this->integer(),
            'id'=>$this->integer(),
            'nombre'=>$this->string(),
            'mail'=>$this->string(),
            'pass'=>$this->string(),
            'municipio'=>$this->string()
        ]);

        $this->addPrimaryKey('pk_usuario', 'usuario', 'id');
        $this->addForeignKey('fk_usuario_comercializadora', 'usuario', 'id_come', 'comercializadora', 'id');        

        $this->createTable('finca', [
            'id'=>$this->integer(),
            'id_usuario'=>$this->integer(),
            'id_com'=>$this->integer(),
            'producto'=>$this->string(),
            'f_siembra'=>$this->date(),
            'superficie'=>$this->double(),
            'kilos'=>$this->double(),
            'nombre'=>$this->string()
        ]);

        $this->addPrimaryKey('pk_finca', 'finca', 'id');
        $this->addForeignKey('fk_finca_comercializadora', 'finca', 'id_com', 'comercializadora', 'id');
        $this->addForeignKey('fk_finca_usuario', 'finca', 'id_usuario', 'usuario', 'id');

        $this->createTable('precio', [
            'id_prod'=>$this->integer(),
            'id'=>$this->integer(),
            'precio_medio'=>$this->double()
        ]);

        $this->addPrimaryKey('pk_precio', 'precio', 'id');
        $this->addForeignKey('fk_precio_producto', 'precio', 'id_prod', 'producto', 'id');

        $this->createTable('registro_precio', [
            'id'=>$this->integer(),
            'id_prod'=>$this->integer(),
            'id_precio'=>$this->integer(),
            'precio_medio'=>$this->double(),
            'fecha'=>$this->date()
        ]);

        $this->addPrimaryKey('pk_registro_precio', 'registro_precio', 'id');
        $this->addForeignKey('fk_registro_prod', 'registro_precio', 'id_prod', 'producto', 'id');
        $this->addForeignKey('fk_registro_precio', 'registro_precio', 'id_precio', 'precio', 'id');

        $this->createTable('ventas', [
            'id_p'=>$this->integer(),
            'id_c'=>$this->integer(),
            'id_u'=>$this->integer(),
            'n_ventas'=>$this->double(),
            'media'=>$this->double()
        ]);

        $this->addPrimaryKey('pk_ventas', 'ventas', 'id_p, id_c, id_u');
        $this->addForeignKey('fk_ventas_prod', 'ventas', 'id_p', 'producto', 'id');
        $this->addForeignKey('fk_ventas_user', 'ventas', 'id_u', 'usuario', 'id');
        $this->addForeignKey('fk_ventas_comercializadora', 'ventas', 'id_c', 'comercializadora', 'id');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('ventas');
        $this->dropTable('comercializadora');
        $this->dropTable('producto');
        $this->dropTable('usuario');
        $this->dropTable('finca');
        $this->dropTable('precio');
        $this->dropTable('registro_precio');
    }
}


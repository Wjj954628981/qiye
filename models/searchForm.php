<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class searchForm extends Model
{
    public $warehouse_id;
    public $item_name;

    // private $_warehouse_id = false;
    // private $_item_name = false;


    public function rules()
    {
        return [
            // username and password are both required
            [['warehouse_id', 'item_name'], 'required'],
         
        ];
    }

    // /**
    //  * Validates the password.
    //  * This method serves as the inline validation for password.
    //  *
    //  * @param string $attribute the attribute currently being validated
    //  * @param array $params the additional name-value pairs given in the rule
    //  */
    // public function validateWarehouse($attribute, $params)
    // {
    //     if (!$this->hasErrors()) {
    //         $warehouse = $this->getWarehouse();

    //         if (!$warehouse) {
    //             $this->addError($attribute, '仓库不存在.');
    //         }
    //     }
    // }


    // public function validateItemName($attribute, $params)
    // {
    //     if (!$this->hasErrors()) {
    //         $item_name = $this->getName();

    //         if (!$item_name) {
    //             $this->addError($attribute, '名称不存在.');
    //         }
    //     }
    // }
    // *
    //  * Logs in a user using the provided username and password.
    //  * @return bool whether the user is logged in successfully
     
    // public function search()
    // {
    //     if ($this->validate()) {
    //         return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
    //     }
    //     return false;
    // }

    // public function getWarehouse()
    // {
    //     if ($this->_warehouse_id === false) {
    //         $this->_warehouse_id = Warehouse::findByWarehouseId($this->warehouse_id);
    //     }

    //     return $this->_warehouse_id;
    // }

    // public function getName()
    // {
    //     if ($this->_item_name === false) {
    //         $this->_item_name = Material::findByMaterialName($this->item_name);
    //         if($this->_item_name === NULL){
    //             $this->_item_name = Product::findByProductName($this->item_name);
    //         }
    //     }

    //     return $this->_item_name;
    // }
}

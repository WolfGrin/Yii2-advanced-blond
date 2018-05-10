<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.05.2018
 * Time: 15:36
 */

namespace common\components\bihaviors;


use yii\base\Behavior;
use yii\db\ActiveRecord;

class StatusBehavior extends Behavior
{
    public $statusList;
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'afterFindStatus',
        ];
    }

    public function getStatusList()
    {
        return $this->statusList;
    }

    public function getStatusName()
    {
        $list = $this->owner->getStatusList();
        return $list[$this->owner->status_id];
    }

    public function afterFindStatus()
    {
        return $this->owner->title .= " (".$this->owner->statusName.")";
    }
}
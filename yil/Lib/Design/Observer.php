<?php
/**
 * 观察者模式
观察者设计模式能够更便利创建和查看目标对象状态的对象，并且提供和核心对象非耦合的置顶功能性。观察者设计模式非常常用，在一般复杂的WEB系统中，观察者模式可以帮你减轻代码设计的压力，降低代码耦合。
场景设计
设计一个订单类
订单创建完成后，会做各种动作，比如发送EMAIL，或者改变订单状态等等。
原始的方法，是将这些操作都写在create函数里面
但是随着订单创建类的越来越庞大，这样的操作已经无法满足需求和快速变动
这个时候，观察者模式出现了。
 */
namespace Lib\Design;

/**
 * 给观察者定义规范
 */
interface Ob_standard{
    public function update(Observer $obj);
}

/**
 * 观察者
 */
class Observer{
    public static $_observers = array();//定义保存观察者的数组
    //添加观察者
    public static function attach(Ob_standard $obj){
        self::$_observers[] = $obj;
    }
    //运行观察者
    public function __construct() {
        $this->notify();
    }
    
    public function notify(){
        foreach (self::$_observers as $obj){
            $obj->update($this);
        }
    }
    
}
/**
 * 观察者1
 */
class Email implements Ob_standard{
    public function update(Observer $obj) {
        echo '发送邮件';
    }
}
/**
 * 观察者2
 */
class Files implements Ob_standard{
    public function update(Observer $obj) {
        echo '发送邮文件';
    }
}
//实验
Observer::attach(new Files);
$m = new Observer();

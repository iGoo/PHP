<?php
/**
 * 观察者模式示例
 */
//被观察者接口
interface ObservableInterface {
    public function attach(ObserverInterface $observer);
    public function detach(ObserverInterface $observer);
    public function notify();
}
//被观察者 (订单、用户登录、注册)
// 这个Observable可以换成Order来理解
class Observable implements ObservableInterface {
    public $status;
    private $_observers = [];
    public function attach(ObserverInterface $observer) {
        if (! in_array($observer, $this->_observers)) {
            $this->_observers[] = $observer;
        }
    }
    public function detach(ObserverInterface $observer) {
        foreach ($this->_observers as $k => $v) {
            if ($v === $observer) {
                unset($this->_observers[$k]);
            }
        }
    }
    public function notify() {
        foreach ($this->_observers as $v) {
            $v->update($this); //调用观察者的动作
        }
    }
    public function createOrder() {
        $this->status = 1;
        $this->notify();
    }
    public function paidOrder() {
        $this->status = 2;
        $this->notify();
    }
}
/*********************************************************************************/
//观察者接口
interface ObserverInterface {
    public function update(ObservableInterface $observable);
}
//下面是3个观察者类
class ObserverMail implements ObserverInterface {
    public function update(ObservableInterface $observable) {
        if ($observable->status == 1) {
            echo '邮件发送成功' . PHP_EOL;
        }
    }
}
class ObserverSMS implements ObserverInterface {
    public function update(ObservableInterface $observable) {
        if ($observable->status == 2) {
            echo '短信发送成功' . PHP_EOL;
        }
    }
}
class ObserverLog implements ObserverInterface {
    public function update(ObservableInterface $observable) {
        echo '日志写入成功' . PHP_EOL;
    }
}

//Client
$observable = new Observable;
$observable->attach(new ObserverMail());
$observable->attach(new ObserverSMS());
$observable->attach(new ObserverLog());
$observable->createOrder();
echo PHP_EOL;
$observable->paidOrder();
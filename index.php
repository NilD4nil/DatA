<?php
class Arr implements ArrayAccess{
    private $arr = [];
    public function offsetExists($offset){
        return isset($this -> arr[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this -> arr[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this -> arr[$offset] = $value;
    }
    public function offsetUnset($offset)
    {
        unset($this -> arr[$offset]);
    }
}
$date = new DateTime();

$arr = new Arr();
$arr['day'] = $date -> format('d');
$arr['month'] = $date -> format('m');
$arr['year'] = $date -> format('Y');

echo $arr['day'].':'.$arr['month'].':'.$arr['year'];

$interval = new DateInterval('P0Y0M3DT0H0M0S');
$period = new DatePeriod($arr['day'], $interval, 5);
foreach ($period as $datetime)
    echo $datetime -> format('d.m.Y H:i:s').'<br>';


?>
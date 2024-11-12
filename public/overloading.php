<?php
/**
 * Các phương thức nằm trong cùng 1 lớp, có cùng tên với nhau nhưng có danh sách đối số khác nhau
 * Tùy theo ta gọi đối số thế nào mà sẽ gọi hàm tương ứng
 * Là hình thức đa hình trong quá trình biên dịch (compile time)
 */
class Person
{
    const salary = 100000;
    function __call($nameMethod, $hour)
    {
        if ($nameMethod == 'calculateSalary') {
            switch (count($hour)) {
                case 0:
                    return self::salary;
                default:
                    return self::salary * $hour[0] + $hour[1];
            }
        }
    }
}
$person = new Person();
echo $person->calculateSalary() . '<br/>';
$person1 = new Person();
echo $person1->calculateSalary(10, 20);

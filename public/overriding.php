<?php

/**
 *
 */
class Person
{
    public $fullName;
    public $address;
    public $phone;
    public $email;

    // Phương thức sau sẽ override trong lớp con
    public function calculateSalary()
    {
        return 0;
    }

    public function Person($fullName, $address, $phone, $email)
    {
        $this->fullName = $fullName;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
    }

    // Phương thức sau sẽ override trong lớp con
    public function showInfo()
    {
        echo 'Họ và Tên: ' . $this->fullName . '<br/>';
        echo 'Địa chỉ: ' . $this->address . '<br/>';
        echo 'Điện thoại: ' . $this->phone . '<br/>';
        echo 'Email: ' . $this->email . '<br/>';
    }
}

class Employee extends Person
{
    const price = 5000;
    private $baseSalary;
    private $numOfProduct;

    // Phương thức khởi tạo có tham số
    public function __construct($fullName = "Trần Văn Lười", $address = "Cung Trăng", $phone = "098884", $email = "vinaskype@saohoa.com", $baseSalary = "100", $numOfProduct = "20")
    {
        // Dùng từ khóa parent truy cập vào phương thức cha
        parent::Person($fullName, $address, $phone, $email);
        $this->baseSalary = $baseSalary;
        $this->numOfProduct = $numOfProduct;
    }

    public function inputInfo()
    {
        // Dùng từ khóa parent truy cập vào phương thức cha
        $this->fullName = 'Thích học lại';
        $this->address = 'Sao Hỏa';
        $this->phone = 'XXX898800000';
        $this->email = 'saohoa@saohoa.com';
        $this->baseSalary = 1230000;
        $this->numOfProduct = 10;
    }

    public function showInfo()
    {
        // Dùng từ khóa parent truy cập vào phương thức cha
        parent::showInfo();
        echo 'Lương cơ bản: ' . $this->baseSalary . '<br/>';
        echo 'Số lượng sản phẩm: ' . $this->numOfProduct . '<br/>';
    }

    public function calculateSalary()
    {
        return (int)$this->baseSalary + (int)$this->numOfProduct * self::price;
    }
}

$persons[] = new Employee();
$persons[0]->inputInfo(); // Nhập nhân viên mới
$persons[] = new Employee("Trần Văn Lười", "Cung Trăng", "098884", "vinaskype@saohoa.com", "100", "20");
$persons[0]->inputInfo(); // Nhập nhân viên mới
echo '<h1>Danh sách nhân viên</h1>';
foreach ($persons as $person) {
    $person->showInfo();
    echo 'Tiền lương là:' . $person->calculateSalary();
    echo '<hr/>';
}

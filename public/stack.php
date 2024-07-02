<?php

// Code
class Stack
{
    /**
     * @var array
     */
    private $stack; // object

    /**
     * @var int|mixed
     */
    private $limit; // limit items in object

    public function __construct($limit = 10)
    {
        // initialize the stack
        $this->stack = [];
        // stack can only contain this many items
        $this->limit = $limit;
    }

    /**
     * @return void
     */
    public function push($item)
    {
        // trap for stack overflow
        if (count($this->stack) < $this->limit) {
            // prepend item to the start of the array
            array_unshift($this->stack, $item);
        } else {
            throw new RunTimeException('Stack is full!');
        }
    }

    /**
     * @return mixed|null
     */
    public function pop()
    {
        if (empty($this->stack)) {
            // trap for stack underflow
            throw new RunTimeException('Stack is empty!');
        } else {
            return array_shift($this->stack);
        }
    }

    /**
     * @return false|mixed
     */
    public function top()
    {
        return current($this->stack);
    }
}

// Run
$myStack = new Stack();
// Thêm các phần tử
$myStack->push('A Dream of Spring');
$myStack->push('The Winds of Winter');
$myStack->push('A Dance with Dragons');
$myStack->push('A Feast for Crows');
$myStack->push('A Storm of Swords');
$myStack->push('A Clash of Kings');
$myStack->push('A Game of Thrones');
// Lấy các phần tử
echo $myStack->pop();
echo '<br/>'; // outputs 'A Game of Thrones'
echo $myStack->pop();
echo '<br/>'; // outputs 'A Clash of Kings'
echo $myStack->pop();
echo '<br/>'; // outputs 'A Storm of Swords'
// Hiển thị phần tử trên cùng của stack
echo $myStack->top();
echo '<br/>'; // outputs 'A Feast for Crows'
// Lấy tiếp phần tử
echo $myStack->pop();
echo '<br/>'; // outputs 'A Feast for Crows'
// Thêm tiếp phần tử
$myStack->push('The Armageddon Rag');
echo $myStack->pop();
echo '<br/>'; // outputs 'The Armageddon Rag'

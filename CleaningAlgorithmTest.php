<?php
include 'CleaningAlgorithm.php';
class CleaningAlgorithmTest extends \PHPUnit_Framework_TestCase
{
    /* public function testSimple1()
    {
        $car = [1,2,3,rand(1,99)];
        $pods = [2=>true];
        $classes = [3=>0.2];
        $settings = [1.4,10,rand(10,30),30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    } */
    
    // Tests for clean which doesn't fall today
    public function testNotTodayLastCleanGreaterThanStdCleanWithPods()
    {
        $car = [1,2,3,25];
        $pods = [2=>true];
        $classes = [3=>0.2];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    public function testNotTodayLastCleanGreaterThanStdCleanWithPodsFalse()
    {
        $car = [1,2,3,25];
        $pods = [2=>false];
        $classes = [3=>0.2];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    public function testNotTodayLastCleanGreaterThanStdCleanWithNullPods()
    {
        $car = [1,2,3,25];
        $pods = [];
        $classes = [3=>0.2];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    public function testNotTodayLastCleanGreaterThanStdCleanWithNullClasses()
    {
        $car = [1,2,3,25];
        $pods = [2=>true];
        $classes = [];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    
    public function testNotTodayLastCleanLessThanStdCleanWithPods()
    {
        $car = [1,2,3,20];
        $pods = [2=>true];
        $classes = [3=>0.2];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    public function testNotTodayLastCleanLessThanStdCleanWithPodsFalse()
    {
        $car = [1,2,3,20];
        $pods = [2=>false];
        $classes = [3=>0.2];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    public function testNotTodayLastCleanLessThanStdCleanWithNullPods()
    {
        $car = [1,2,3,20];
        $pods = [];
        $classes = [3=>0.2];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    public function testNotTodayLastCleanLessThanStdCleanWithNullClasses()
    {
        $car = [1,2,3,25];
        $pods = [2=>true];
        $classes = [];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    
    
    // Tests for clean which fall today
    public function testForTodayLastCleanGreaterThanStdCleanWithPods()
    {
        $car = [1,2,3,25];
        $pods = [2=>true];
        $classes = [3=>0.2];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    public function testForTodayLastCleanGreaterThanStdCleanWithPodsFalse()
    {
        $car = [1,2,3,25];
        $pods = [2=>false];
        $classes = [3=>0.2];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    public function testForTodayLastCleanGreaterThanStdCleanWithNullPods()
    {
        $car = [1,2,3,25];
        $pods = [];
        $classes = [3=>0.2];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    public function testForTodayLastCleanGreaterThanStdCleanWithNullClasses()
    {
        $car = [1,2,3,25];
        $pods = [2=>true];
        $classes = [];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    
    public function testForTodayLastCleanLessThanStdCleanWithPods()
    {
        $car = [1,2,3,20];
        $pods = [2=>true];
        $classes = [3=>0.2];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    public function testForTodayLastCleanLessThanStdCleanWithPodsFalse()
    {
        $car = [1,2,3,20];
        $pods = [2=>false];
        $classes = [3=>0.2];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    public function testForTodayLastCleanLessThanStdCleanWithNullPods()
    {
        $car = [1,2,3,20];
        $pods = [];
        $classes = [3=>0.2];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    public function testForTodayLastCleanLessThanStdCleanWithNullClasses()
    {
        $car = [1,2,3,25];
        $pods = [2=>true];
        $classes = [];
        $settings = [1.4,10,24,30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
}
?>
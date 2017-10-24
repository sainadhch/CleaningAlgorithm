<?php
include 'CleaningAlgorithm.php';
class CleaningAlgorithmTest extends \PHPUnit_Framework_TestCase
{
    // Tests for clean which doesn't fall today
    public function testNotTodayLastCleanGreaterThanStdCleanWithPods()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 25];
        $pods = [2=>true];
        $classes = [3=>0.2];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    public function testNotTodayLastCleanGreaterThanStdCleanWithPodsFalse()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 25];
        $pods = [2=>false];
        $classes = [3=>0.2];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    public function testNotTodayLastCleanGreaterThanStdCleanWithNullPods()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 25];
        $pods = [];
        $classes = [3=>0.2];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    public function testNotTodayLastCleanGreaterThanStdCleanWithNullClasses()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 25];
        $pods = [2=>true];
        $classes = [];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    
    public function testNotTodayLastCleanLessThanStdCleanWithPods()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 20];
        $pods = [2=>true];
        $classes = [3=>0.2];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    public function testNotTodayLastCleanLessThanStdCleanWithPodsFalse()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 20];
        $pods = [2=>false];
        $classes = [3=>0.2];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    public function testNotTodayLastCleanLessThanStdCleanWithNullPods()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 20];
        $pods = [];
        $classes = [3=>0.2];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    public function testNotTodayLastCleanLessThanStdCleanWithNullClasses()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 20];
        $pods = [2=>true];
        $classes = [];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result);
    }
    
    
    // Tests for clean which fall today
    public function testForTodayLastCleanGreaterThanStdCleanWithPods()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 25];
        $pods = [2=>true];
        $classes = [3=>0.2];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    public function testForTodayLastCleanGreaterThanStdCleanWithPodsFalse()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 25];
        $pods = [2=>false];
        $classes = [3=>0.2];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    public function testForTodayLastCleanGreaterThanStdCleanWithNullPods()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 25];
        $pods = [];
        $classes = [3=>0.2];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    public function testForTodayLastCleanGreaterThanStdCleanWithNullClasses()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 25];
        $pods = [2=>true];
        $classes = [];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    
    public function testForTodayLastCleanLessThanStdCleanWithPods()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 20];
        $pods = [2=>true];
        $classes = [3=>0.2];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    public function testForTodayLastCleanLessThanStdCleanWithPodsFalse()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 20];
        $pods = [2=>false];
        $classes = [3=>0.2];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    public function testForTodayLastCleanLessThanStdCleanWithNullPods()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 20];
        $pods = [];
        $classes = [3=>0.2];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
    public function testForTodayLastCleanLessThanStdCleanWithNullClasses()
    {
        $car = ['id' => 1, 'pod_id' => 2, 'class_id' => 3, 'last_clean' => 20];
        $pods = [2=>true];
        $classes = [];
        $settings = ['dirty_pod' => 1.4, 'min_freq' => 10, 'std_freq' => 24, 'max_freq' => 30];
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result);
    }
}
?>
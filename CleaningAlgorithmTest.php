<?php
// Including CleaningAlgorithm
include 'CleaningAlgorithm.php';

/*
 * Class CleaningAlgorithmTest
 * Tests the CleaningAlgorithm with multiple test cases
 * @Author Sainadh Ch <chandu.sainath@gmail.com>
 */
class CleaningAlgorithmTest extends \PHPUnit_Framework_TestCase
{
    /*
     * Test Case for car clean without Pods and with Classes Factor
     * This Test for not Today Assertion Should Pass
     */
    public function testForNotTodayWithOutPodsAndWithClassesFactor()
    {
        $car = array('id' => 8, 'pod_id' => 12, 'class_id' => 1, 'last_clean' => 9);
        $pods = array(11 => true, 12 => false);
        $classes = array(1 => 0.7, 2 => 1.0, 3 => 1.5);
        $settings = array(
                        'dirty_pod' => 0.9,
                        'min_freq' => 7,
                        'std_freq' => 14,
                        'max_freq' => 28,
                        );
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result, "Test Case for car clean without Pods and with Classes Factor Failed 0 expecting but got ".$result);
    }
    
    /*
     * Test Case for car clean with Pods and with Classes Factor
     * This Test for Today Assertion Should Pass
     */
    public function testForTodayWithPodsAndWithClassesFactor()
    {
        $car = array('id' => 8, 'pod_id' => 12, 'class_id' => 1, 'last_clean' => 9);
        $pods = array(11 => true, 12 => true);
        $classes = array(1 => 0.7, 2 => 1.0, 3 => 1.5);
        $settings = array(
                        'dirty_pod' => 0.9,
                        'min_freq' => 7,
                        'std_freq' => 14,
                        'max_freq' => 28,
                        );
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result, "Test Case for car clean with Pods and with Classes Factor Failed 0 expecting but got ".$result);
    }
    
    /*
     * Test Case for car clean without Pods and with Classes Factor
     * This Test for Today Assertion Should Fail
     */
    public function testForTodayWithOutPodsAndWithClassesFactor()
    {
        $car = array('id' => 8, 'pod_id' => 12, 'class_id' => 1, 'last_clean' => 9);
        $pods = array(11 => true, 12 => false);
        $classes = array(1 => 0.7, 2 => 1.0, 3 => 1.5);
        $settings = array(
                        'dirty_pod' => 0.9,
                        'min_freq' => 7,
                        'std_freq' => 14,
                        'max_freq' => 28,
                        );
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertEquals(0, $result, "Test Case for car clean without Pods and with Classes Factor Failed 0 expecting but got ".$result);
    }
    
    /*
     * Test Case for car clean with Pods and with Classes Factor
     * This Test for not Today Assertion Should Fail
     */
    public function testForNotTodayWithPodsAndWithClassesFactor()
    {
        $car = array('id' => 8, 'pod_id' => 12, 'class_id' => 1, 'last_clean' => 9);
        $pods = array(11 => true, 12 => true);
        $classes = array(1 => 0.7, 2 => 1.0, 3 => 1.5);
        $settings = array(
                        'dirty_pod' => 0.9,
                        'min_freq' => 7,
                        'std_freq' => 14,
                        'max_freq' => 28,
                        );
        $getObj = new CleaningAlgorithm;

        $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
        
        $this->assertGreaterThan(0, $result, "Test Case for car clean with Pods and with Classes Factor Failed 0 expecting but got ".$result);
    }
}
?>

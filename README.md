# CleaningAlgorithm
Determines when a car is due to be cleaned.

# Usage
  1. Copy 'CleaningAlgorithm.php' to server or localhost.
  2. Where required use autoload or include '<path-to-file>CleaningAlgorithm.php'.
  3. set input arrays say, 
        $car = [1,2,3,25];
        $pods = [2=>true];
        $classes = [3=>0.2];
        $settings = [1.4,10,24,30];
   4. Create Instance for the class "CleaningAlgorithm".
        Ex: $getObj = new CleaningAlgorithm;
   5. Now "calculateNextClean" method can be called.
        Ex: $getObj->calculateNextClean($car, $pods, $classes, $settings);

# PHPUnit Testing
   PHPUnit testing file 'CleaningAlgorithmTest.php'

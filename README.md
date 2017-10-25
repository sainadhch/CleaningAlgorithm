# CleaningAlgorithm
    Determines when a car is due to be cleaned.

# Requirements
    
    * Code Execution requires PHP 7; using the latest version of PHP is highly recommended.

    * PHPUnit 6.4 requires PHP 7; using the latest version of PHP is highly recommended.

    * PHPUnit requires the dom and json extensions, which are normally enabled by default.

    * PHPUnit also requires the pcre, reflection, and spl extensions. These standard extensions are enabled by default and cannot be disabled without patching PHP's build system and/or C sources.
    
    * Hardware requirements The recommended minimum requirements are 256MB of RAM for a single-computer and 50MB of storage.
    
# Code Usage

    1. Clone or download files and upload 'CleaningAlgorithm.php' to server or localhost.
    2. Where required use autoload or include 'CleaningAlgorithm.php'.
    3. Create Instance for the class "CleaningAlgorithm".
    4. Now "calculateNextClean" method can be called.
    5. The function parameters are defined as follows:
        * $car a 1­D array with the following keys mapped to int values
            * ‘id’ the Car’s ID
            * ‘pod_id’ the ID of the Car’s Pod ­ a key into $pods
            * ‘class_id’ the ID of the Car’s Class ­ a key into $classes
            * ‘last_clean’ the number of days since the car was last cleaned

        * $pods a 1­D array of Pod IDs (ints) mapped to boolean values
        * $classes a 1­D array of Class IDs (ints) mapped to double values
        * $settings a 1­D array with the following keys mapped to int/ double values
            * ‘dirty_pod’ the “dirty pod” factor (double)
            * ‘min_freq’ the minimum numbers of days between cleans
            * ‘std_freq’ the standard numbers of days between cleans
            * ‘max_freq’ the maximum numbers of days between cleans
 
# Code Usage Example
    
    ```PHP
    $pods = array(11 => true, 12 => false);
    $classes = array(1 => 0.7, 2 => 1.0, 3 => 1.5);
    $settings = array(
                'dirty_pod' => 0.9,
                'min_freq' => 7,
                'std_freq' => 14,
                'max_freq' => 28,
                );
    $car = array('id' => 7, 'pod_id' => 11, 'class_id' => 3, 'last_clean' => 5);

    $getObj = new CleaningAlgorithm;
    $result = $getObj->calculateNextClean($car, $pods, $classes, $settings);
    echo $result; //will return 14.
    ```
    The standard frequency is 14 days. Car 7 is in Pod 11, which is a “dirty pod”, so we
    multiply by the ‘dirty_pod_factor’ setting of 0.9. Car 7 has Class 3, so we multiply by that Class’s
    factor of 1.5. Our calculated frequency is 14 * 0.9 * 1.5 = 18.9. This rounds to 19 days between
    cleans. The last clean was 5 days ago, so the next clean is due in 19 ­ 5 days, ie. 14 days.
    
    Online Execution Link: [https://www.jdoodle.com/a/beK](https://www.jdoodle.com/a/beK)

# PHPUnit Testing
   PHPUnit testing file 'CleaningAlgorithmTest.php'

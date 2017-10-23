<?php

/*
 * Class CleaningAlgorithm
 * Determines the Cleaning procedures
 * @Author Sainadh Ch <chandu.sainath@gmail.com>
 */
class CleaningAlgorithm
{

    /*
     * calculateNextClean()
     * This function return number of days until the next clean is due.
     * Determine when a car is due to be cleaned.
     * $car = ['id','pod_id','class_id','last_clean']; all int values
     * $pods = ['pod_id'=>(boolean)]; pod_id => boolean values
     * $classes = ['class_id'=>(double)]; class_id => double values
     * $settings = ['dirty_pod','min_freq','std_freq','max_freq']; double, int, int, int respectively
     */
    public function calculateNextClean($car, $pods = false, $classes, $settings)
    {
        $carPodId = $car[1];
        $carClassId = $car[2];
        $carLastCleaned = $car[3];
        $carDirtyPod = $settings[0];
        $carMinCleanFreq = $settings[1];
        $carStdCleanFreq = $settings[2];
        $carMaxCleanFreq = $settings[3];
        
        $isCarHasClassFactor = (isset($classes[$carClassId])?$classes[$carClassId]:1.0);
        $isCarHasPod = (isset($pods[$carPodId])?$pods[$carPodId]:false);
        if($isCarHasPod)
            $carLastCleaned = $carLastCleaned * $carDirtyPod;
        
        $nextClean = round($carStdCleanFreq - $carLastCleaned);
        
        if($nextClean > 0 && $carLastCleaned > $carMinCleanFreq && $carLastCleaned < $carMaxCleanFreq)
            return $nextClean;
        else
          return 0;
            
    }

}
?>
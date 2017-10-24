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
    public function calculateNextClean($car, $pods, $classes, $settings)
    {
        $carPodId = $car['pod_id'];
        $carClassId = $car['class_id'];
        $carLastCleaned = $car['last_clean'];
        $carDirtyPod = $settings['dirty_pod'];
        $carMinCleanFreq = $settings['min_freq'];
        $carStdCleanFreq = $settings['std_freq'];
        $carMaxCleanFreq = $settings['max_freq'];
        
        $isCarHasPod = (isset($pods[$carPodId])?$pods[$carPodId]:false);
        if($isCarHasPod)
            $carStdCleanFreq = $carStdCleanFreq * $carDirtyPod;
        
        $isCarHasClassFactor = (isset($classes[$carClassId])?$classes[$carClassId]:1.0);
        $carStdCleanFreq = $carStdCleanFreq * $isCarHasClassFactor;
        
        $nextClean = $carStdCleanFreq - $carLastCleaned;
        
        if($nextClean > 0 && $carStdCleanFreq > $carMinCleanFreq && $carStdCleanFreq < $carMaxCleanFreq)
            return round($nextClean);
        else
          return 0;
            
    }

}
?>
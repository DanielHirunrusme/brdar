<div id="About">
    <?php
        $wordarray = explode(' ', $site->description()); 
        if (count($wordarray) > 1 ) { 
            for($i = 0; $i<count($wordarray); $i++) {
                $wordarray[$i] = '<span class="in-view">'.($wordarray[$i]).'&nbsp;</span>'; 
            }
        
        $wordarray = implode(' ', $wordarray);  
        }  
    ?>
    <?php echo $wordarray ?>
</div>
<?php print_r($choices)?>
<div class="ten wide column">
    <h4> <?php echo $surv['name']; ?> </h4>
    
    <div class="ui floating labeled icon dropdown button">
    <i class="filter icon"></i>
    <span class="text">Filter by</span>
    <div class="menu">
      <div class="item">
        All
      </div>
      <div class="item">
        College of Arts and Sciences
      </div>
      <div class="item">
        College of Education
      </div>
      <div class="item">
        School of Business and Accountancy
      </div>
    </div>
  </div> 
    
<select name="filter"> 
    <option selected>
        ALL
    </option>
    <option> 
    CAS
    </option> 
    <option> 
    SBE
    </option> 
    <option> 
    CAFA
    </option> 
    <option> 
    COED 
    </option> 
    <option> 
    SLG
    </option> 
</select> 
    
    
     <p> 
    <?php 
      
      $ndx=0;
        for($x=0;$x<$totalq;){
          
            echo $res[$x]['question_data'];
            echo "<br>";
            
                for($i=$ndx;$i<$totalc-1;){
                    if($res[$x]['question_id'] == $choices[$i]['question_id']){
                        echo $res[$x]['question_id'] ."chice". $choices[$i]['question_id'];
                        echo $choices[$i]['choice_data'];
                        $i++;
                    }
                    else{
                        echo "hello";
                        break;   
                    }
                }
        $ndx=$i;
        echo "ndx is";
        echo $ndx;
        $x++;
        echo "<br>";
        }
    ?>
        
            
                
        
       <!-- <?php
        for($i=0;$i<$total;){
            echo $res[$i]['question_data'];
            $i++;
        }
        
        ?>!-->
        
        
    
    </p> 

   
</div>
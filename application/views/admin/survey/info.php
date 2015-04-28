<div class="ten wide column">
    			<h2>Survey Information
    			&nbsp;&nbsp;&nbsp;&nbsp;
           
                        </h2> 
<table class="ui very basic table">
	<tr>
		<td><strong>No.</strong></td>
		<td><?php echo $surv['id']; ?></td>
	</tr>
	<tr>
		<td><strong>Survey Name :</strong></td>
		<td><?php echo  $surv['name']; ?></td>
	</tr>
	<tr>
		<td><strong>Created Date :</strong></td>
		<td><?php echo date("m - d - Y ", strtotime($surv['date_created'])); ?></td>
	</tr>
	<tr>
		<td><strong>Issued Date :</strong></td>
		<td><?php if(date("m - d - Y ", strtotime($surv['date_issued'])) > "01 - 01 - 2000")
                                echo date("m - d - Y ", strtotime($surv['date_issued']));
                              else
                                  echo "N/A"; ?>  </td>
	</tr>
	<tr>
		<td><strong>Status Code :</strong></td>
		<td><?php echo $surv['status'] ?></td>
	</tr>
</table>
        
           
       
           
    <div class ="row">   
          <?php echo anchor('admin/survey', '<button class="tiny ui button">Back</button> '); ?>
    
         
                    <?php if($surv['status'] =='Available'):?>
                    <?php echo btn_editTwo('admin/survey/edit/' . $surv['id']); ?>
                    <?php endif; ?>
                     
                     <?php if(($surv['status'] =='Unavailable')|| ($surv['status'] =='Active')):?>
                         <?php echo btn_report('admin/survey/view_results/' . $surv['id']); ?>
                     <?php endif; ?>

    </div>
     </div>  
    
    
  <!--------------------               VIEW RESULTS STARTS HERE               -------------------------------------------------------------!-->
            
        <div class="ui modal scrolling" id="modal_view_results">
            <i class="close icon"></i>
            <div class="header">
              <?php echo  $surv['name']; ?>
            </div>
            <div class="content">
            
              <div class="description">
                  
                    <div class="ui divided items">
                        <?php
                        if($res == NULL){
                            echo '<div class="ui inverted segment">
                                    <p>No results availabe yet</p>
                                  </div>';
                        }
                        else{
                            foreach ($res as $q): ?>                
                                <div class="item">
                                  <div class="content">
                                    <a class="header"><?php echo $q['question_data']; ?> </a>
                                    <div class="meta">
                                      <span class="cinema"></span>
                                    </div>
                                    <div class="description">                                          
                                            <?php foreach ($choices as $c): 
                                                $tot=$per=0;
                                               if($q['question_id'] == $c['question_id']){
                                                   foreach($ans as $a):
                                                   if($a['choice_id'] == $c['choice_id']){
                                                       $tot++;
                                                   }  
                                                   $per = $tot/$ansque[$q['question_id']] *100;
                                                   endforeach; ?>
                                        <table class="ui celled table">
                                                <tr>
                                                    <td style="color:red; width: 65px"><?php echo $per; ?> %</td>
                                                    <td><?php  echo $c['choice_data']; ?></td>
                                                </tr>
                                                </table>
                                               <?php } endforeach ?>   
                                    </div>
                                  </div>    
                                </div>
                        <?php endforeach; } ?>   
                  </div>
                  
              </div>
            </div>
            <div class="actions">
              <div class="ui black button">
                Close
              </div>
              
            </div>
        </div>
     
<!--------------------               VIEW RESULTS MODAL ENDS HERE HERE               -------------------------------------------------------------!-->
  
                       
</div> 
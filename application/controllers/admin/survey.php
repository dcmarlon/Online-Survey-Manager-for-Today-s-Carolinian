<?php

    class Survey extends Admin_Controller{
        
        function __construct ()
	{
		parent::__construct();
                 $this->load->model('survey_m');
                 $this->load->model('question_m');
                 $this->load->model('choice_m');
                 $this->load->model('results_m');
                  
	}
        
       public function index ()
	{

		$this->data['survey'] = $this->survey_m->get_all(); //get all the survey names
		$this->data['subview'] = 'admin/survey/index';
		$this->load->view('admin/_layout_v2', $this->data);
	}
        
        
        
        public function watch($id=null){

                $row = $this->results_m->get_survey($id);
                $data['res'] = $this->results_m->get_questions($id);
                $data['surv'] = array(
				'id' => $row->survey_id,
				'name' => $row->survey_name,
				'date_created' => $row->created_date,
				'date_issued' => $row->issued_date,
				'status' =>$row->status
			);

                $data['subview'] = 'admin/survey/info';
		$this->load->view('admin/_layout_v2', $data); 
            
        }

        public function add(){        
                   
            $this->data['subview']='admin/survey/create_v2' ;
            $this->load->view('admin/_layout_v2',$this->data);           
           }


  	    public function add_survey_v2(){
			
			if($this->survey_m->insert_survey_v2() != false){	
                            
                                 redirect('/admin/survey', 'location', 301); 
                 
			}else{
				echo "error";
			} 
			 
		}    
		
		//not final function
		public function add_answers(){
			/*add validation rules to each of the input pwede ra wala */
			//insert code here
			
			if($this->answers_m->insert_answer() != false){	
                            
                                 redirect('/user/student', 'location', 301); 
                 
			}else{
				echo "error";
			}
			
			 
			 
		} 
                
                
                public function edit_survey_v2(){
                    
                    	if($this->survey_m->edit_survey_v() != false){	
                            
                                 redirect('/admin/survey', 'location', 301); 
                 
			}else{
				echo "error";
			}
                    
                }

        
       	public function edit ($id = NULL)
	{
            
         
		if ($id) {
			$this->data['survs'] = $this->survey_m->get($id);
			count($this->data['survs']) || $this->data['errors'][] = 'survey could not be found';

		}

	           $this->data['subview']='admin/survey/edit_v2' ;
                     $this->load->view('admin/_layout_v2',$this->data);
        }
        
        
        public function deleteQuestion($id){
		$this->load->model('survey_m');
		if($this->survey_m->deleteUserFromDB($id)){
			
				echo "success";
		}else{
			echo "invalid";
		}	
	}
        
//           public function deleteChoices($id){
//		$this->load->model('survey_m');
//		if($this->survey_m->deleteUserFromDBs($id)){
//			
//				echo "success";
//		}else{
//			echo "invalid id";
//		}	
//	}
        
           public function delete_choiceby_id($id){
		$this->load->model('survey_m');
		if($this->survey_m->delete_choice_id($id)){
			
				echo "success";
		}else{
			echo "invalid id";
		}	
	}
        
        
        
        
    }
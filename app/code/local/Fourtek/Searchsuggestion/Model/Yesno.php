<?php 
class Fourtek_Searchsuggestion_Model_Yesno
{
    public function toOptionArray()
    {
        $data =  array(
        				array('value'=>'0', 'label'=>'Yes'),
        				array('value'=>'1', 'label'=>'No'),
        			);
        return  $data;                
    }
  } 

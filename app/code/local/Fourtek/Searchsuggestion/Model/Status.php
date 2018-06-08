<?php 
class Fourtek_Searchsuggestion_Model_Status
{
    public function toOptionArray()
    {
        $data =  array(
        				array('value'=>'0', 'label'=>'Show Tags only'),
        				array('value'=>'1', 'label'=>'Show Products only'),
        				array('value'=>'2', 'label'=>'Show Both'),
        		);
        return  $data;                
    }
  } 

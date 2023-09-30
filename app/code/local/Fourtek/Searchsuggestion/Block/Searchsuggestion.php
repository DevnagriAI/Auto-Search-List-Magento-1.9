<?php
	class Fourtek_Searchsuggestion_Block_Searchsuggestion extends Mage_CatalogSearch_Block_Autocomplete	{		
    protected $_suggestData = null;

    protected function _toHtml()
    {
		$searchSetting = Mage::getStoreConfig("searchsuggestion/searchoption/searchsuggestionsetting");
		$ProductSetting = Mage::getStoreConfig("searchsuggestion/searchoption/productsuggestionsetting");
		
        $html = '';

        if (!$this->_beforeToHtml()) {
            return $html;
        }

        $suggestData = $this->getSuggestData();
        if (!($count = count($suggestData))) {
            return $html;
        }

        $count--;
		$html = '<ul class="suggestion-list">';
		if($searchSetting==1){
			foreach ($suggestData as $index => $item) {
				$str="";
				$term = $this->escapeHtml($item['term']);
				$formattedPrice = Mage::helper('core')->currency($this->escapeHtml($item['price']),true,false);
				$productUrl = $this->escapeHtml($item['product']);
				$imgUrl = $this->escapeHtml($item['image']);
				$productName = $this->escapeHtml($item['title']);
				$specialPrice = $this->escapeHtml($item['specialPrice']);
				$len = strlen($term);
				$title = $this->escapeHtml($item['title']);
				
				$term1 = strtolower($term);
				$productName1 = strtolower($productName);
				
				$pos = strpos($productName1, $term1);
				
				for($i=0;$i<$len;$i++){
					$j=$pos+$i;
					$subTerm = substr($term,$i,1);
					$subTerm1 = strtolower($subTerm);
					$subTerm2 = strtoupper($subTerm);
					
					$subName = substr($productName,$j,1);
					
					if($subTerm1==$subName){
						$str .= $subTerm1;
					}else if($subTerm2==$subName){
						$str .= $subTerm2;
					}
				}	
				if(strlen($str)>=$len){
					$productName = str_replace($str,'<b>'.$str.'</b>',$productName);
				}
				$formattedPrice = str_replace($term,'<b>'.$term.'</b>',$formattedPrice);
			
				if($ProductSetting==1){
					if($specialPrice>0){
						$specialPrice = Mage::helper('core')->currency($specialPrice,true,false);
						$html .= '<li class="product" title="'.$title.'"><a href="'.$productUrl.'"><div class="sug-name full"><span>'.$productName.'</span><span class="old-price">'.$formattedPrice.'</span><span class="price">'.$specialPrice.'</span></div></a></li>';
					}else{
						$html .= '<li class="product" title="'.$title.'"><a href="'.$productUrl.'"><div class="sug-name full"><span>'.$productName.'</span><span class="price">'.$formattedPrice.'</span></div></a></li>';
					}
					
				}else{
					if($specialPrice>0){
						$specialPrice = Mage::helper('core')->currency($specialPrice,true,false);
						$html .= '<li class="product" title="'.$title.'"><a href="'.$productUrl.'"><div class="sug-img"><img src="'.$imgUrl.'"></div><div class="sug-name"><span>'.$productName.'</span><span class="old-price">'.$formattedPrice.'</span><span class="price">'.$specialPrice.'</span></div></a></li>';
					}else{
						$html .= '<li class="product" title="'.$title.'"><a href="'.$productUrl.'"><div class="sug-img"><img src="'.$imgUrl.'"></div><div class="sug-name"><span>'.$productName.'</span><span class="price">'.$formattedPrice.'</span></div></a></li>';
					}
				}		
			}
		}elseif($searchSetting==2){			
			foreach ($suggestData[0] as $index => $item) {
				$str="";
				$term = $this->escapeHtml($item['term']);
				$tagName = $this->escapeHtml($item['title']);
				$len = strlen($term);
				$title = $this->escapeHtml($item['title']);
				$term1 = strtolower($term);
				$tagName1 = strtolower($tagName);
				$pos = strpos($tagName1, $term1);
				for($i=0;$i<$len;$i++){
					$j=$pos+$i;
					$subTerm = substr($term,$i,1);
					$subTerm1 = strtolower($subTerm);
					$subTerm2 = strtoupper($subTerm);
					
					$subName = substr($tagName,$j,1);
					
					if($subTerm1==$subName){
						$str .= $subTerm1;
					}else if($subTerm2==$subName){
						$str .= $subTerm2;
					}
				}	
				if(strlen($str)>=$len){
					$tagName = str_replace($str,'<b>'.$str.'</b>',$tagName);
				}
				$html .=  '<li class="tag" title="'.$this->escapeHtml($item['title']).'" class="">'. '<span class="amount">'.$item['num_of_results'].'</span>'.$tagName.'</li>';
			}
			if(count($suggestData[1])>0){
				$html .=  '<li class="popular"><span class="popular-bottom"></span><span class="popular-title">Popular Products</span></li>';
			}
			foreach ($suggestData[1] as $index => $item) {
				$str="";
				$term = $this->escapeHtml($item['term']);
				$formattedPrice = Mage::helper('core')->currency($this->escapeHtml($item['price']),true,false);
				$productUrl = $this->escapeHtml($item['product']);
				$imgUrl = $this->escapeHtml($item['image']);
				$productName = $this->escapeHtml($item['title']);
				$specialPrice = $this->escapeHtml($item['specialPrice']);
				$len = strlen($term);
				$title = $this->escapeHtml($item['title']);
				
				$term1 = strtolower($term);
				$productName1 = strtolower($productName);
				
				$pos = strpos($productName1, $term1);
				
				for($i=0;$i<$len;$i++){
					$j=$pos+$i;
					$subTerm = substr($term,$i,1);
					$subTerm1 = strtolower($subTerm);
					$subTerm2 = strtoupper($subTerm);
					
					$subName = substr($productName,$j,1);
					
					if($subTerm1==$subName){
						$str .= $subTerm1;
					}else if($subTerm2==$subName){
						$str .= $subTerm2;
					}
				}	
				if(strlen($str)>=$len){
					$productName = str_replace($str,'<b>'.$str.'</b>',$productName);
				}
				$formattedPrice = str_replace($term,'<b>'.$term.'</b>',$formattedPrice);
			
				if($ProductSetting==1){
					if($specialPrice>0){
						$specialPrice = Mage::helper('core')->currency($specialPrice,true,false);
						$html .= '<li class="product" title="'.$title.'"><a href="'.$productUrl.'"><div class="sug-name full"><span>'.$productName.'</span><span class="old-price">'.$formattedPrice.'</span><span class="price">'.$specialPrice.'</span></div></a></li>';
					}else{
						$html .= '<li class="product" title="'.$title.'"><a href="'.$productUrl.'"><div class="sug-name full"><span>'.$productName.'</span><span class="price">'.$formattedPrice.'</span></div></a></li>';
					}
					
				}else{
					if($specialPrice>0){
						$specialPrice = Mage::helper('core')->currency($specialPrice,true,false);
						$html .= '<li class="product" title="'.$title.'"><a href="'.$productUrl.'"><div class="sug-img"><img src="'.$imgUrl.'"></div><div class="sug-name"><span>'.$productName.'</span><span class="old-price">'.$formattedPrice.'</span><span class="price">'.$specialPrice.'</span></div></a></li>';
					}else{
						$html .= '<li class="product" title="'.$title.'"><a href="'.$productUrl.'"><div class="sug-img"><img src="'.$imgUrl.'"></div><div class="sug-name"><span>'.$productName.'</span><span class="price">'.$formattedPrice.'</span></div></a></li>';
					}
				}		
			}

			
		}else{
			foreach ($suggestData as $index => $item) {
				$str="";
				$term = $this->escapeHtml($item['term']);
				$tagName = $this->escapeHtml($item['title']);
				$len = strlen($term);
				$title = $this->escapeHtml($item['title']);
				$term1 = strtolower($term);
				$tagName1 = strtolower($tagName);
				$pos = strpos($tagName1, $term1);
				for($i=0;$i<$len;$i++){
					$j=$pos+$i;
					$subTerm = substr($term,$i,1);
					$subTerm1 = strtolower($subTerm);
					$subTerm2 = strtoupper($subTerm);
					
					$subName = substr($tagName,$j,1);
					
					if($subTerm1==$subName){
						$str .= $subTerm1;
					}else if($subTerm2==$subName){
						$str .= $subTerm2;
					}
				}	
				if(strlen($str)>=$len){
					$tagName = str_replace($str,'<b>'.$str.'</b>',$tagName);
				}			
				$html .=  '<li class="tag" title="'.$this->escapeHtml($item['title']).'" class="">'. '<span class="amount">'.$item['num_of_results'].'</span>'.$tagName.'</li>';
			}
		}	
        $html.= '</ul>';
        return $html;
    }

    public function getSuggestData()
    {
		$searchSetting = Mage::getStoreConfig("searchsuggestion/searchoption/searchsuggestionsetting");
		$ProductSetting = Mage::getStoreConfig("searchsuggestion/searchoption/productsuggestionsetting");	
        
        $query = $this->helper('catalogsearch')->getQueryText();
              
        if (!$this->_suggestData) {
			if($searchSetting==1){
				$collection = Mage::getModel('catalog/product')
							->getCollection()
							->addAttributeToSelect('*')
							->addAttributeToSort('name', 'DESC')
							->addAttributeToFilter( array ( array('attribute'=> 'name','like' => '%'.$query.'%'),
															array('attribute'=> 'sku','like' => '%'.$query.'%'),
															array('attribute'=> 'price','like' => '%'.$query.'%'),
															)
													);
				$collection->joinField('rating_summary', 'review_entity_summary', 'rating_summary', 'entity_pk_value=entity_id', array('entity_type'=>1, 						'store_id'=> Mage::app()->getStore()->getId()), 'left')
										->setOrder('rating_summary', 'desc');
										
				$data = array();
				foreach ($collection as $item) {
					$dateToday = date('Y-m-d H:i:s');
					$specialFromDate = $item->getSpecialFromDate();
					$specialToDate = $item->getSpecialToDate();
					$price = (float) $item->getFinalPrice();
					$specialPrice = (float) $item->getSpecialPrice();
								
					if($dateToday>=$specialFromDate && $dateToday<=$specialToDate){
						$specialPrice = (float) $item->getSpecialPrice();
					}else{
						$specialPrice = 0;
					}
					$_data = array(
						'title' => $item->getName(),
						'image' => $item->getImageUrl(),
						'product' =>$item->getProductUrl(),
						'price' => $price,
						'specialPrice' => $specialPrice,
						'term' => $query
					);
					$data[] = $_data;
				}
				
			}elseif($searchSetting==2){							
				$data1 = array();
				$data2 = array();
				$collection1 = $this->helper('catalogsearch')->getSuggestCollection();

				foreach ($collection1 as $item) {
					$_data = array(
						'title' => $item->getQueryText(),
						'num_of_results' => $item->getNumResults(),
						'term' => $query
					);
						$data1[] = $_data;
				}

				$collection2 = Mage::getModel('catalog/product')
							->getCollection()
							->addAttributeToSelect('*')
							->addAttributeToSort('name', 'DESC')
							->addAttributeToFilter( array ( array('attribute'=> 'name','like' => '%'.$query.'%'),
															array('attribute'=> 'sku','like' => '%'.$query.'%'),
															array('attribute'=> 'price','like' => '%'.$query.'%'),
															)
													);
				$collection2->joinField('rating_summary','review_entity_summary', 'rating_summary', 'entity_pk_value=entity_id', array('entity_type'=>1, 						'store_id'=> Mage::app()->getStore()->getId()), 'left')
										->setOrder('rating_summary', 'desc')								
							->setPageSize(2);
				foreach ($collection2 as $item) {
					$dateToday = date('Y-m-d H:i:s');
					$specialFromDate = $item->getSpecialFromDate();
					$specialToDate = $item->getSpecialToDate();
					$price = (float) $item->getPrice();
					$specialPrice = (float) $item->getSpecialPrice();
								
					if($dateToday>=$specialFromDate && $dateToday<=$specialToDate){
						$specialPrice = (float) $item->getSpecialPrice();
					}else{
						$specialPrice = 0;
					}
					$_data = array(
						'title' => $item->getName(),
						'image' => $item->getImageUrl(),
						'product' =>$item->getProductUrl(),
						'price' => $price,
						'specialPrice' => $specialPrice,
						'term' => $query
					);
					$data2[] = $_data;
				}
			$data = array($data1,$data2);
			}else{
				$collection = $this->helper('catalogsearch')->getSuggestCollection();
				$counter = 0;
				$data = array();
				foreach ($collection as $item) {
					$_data = array(
						'title' => $item->getQueryText(),
						'num_of_results' => $item->getNumResults(),
						'term' => $query
					);

					if ($item->getQueryText() == $query) {
						array_unshift($data, $_data);
					}
					else {
						$data[] = $_data;
					}
				}
			}
			$this->_suggestData = $data;
        }
        return $this->_suggestData;
    }
}

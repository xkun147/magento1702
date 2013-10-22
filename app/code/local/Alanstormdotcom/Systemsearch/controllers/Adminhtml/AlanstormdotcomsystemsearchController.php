<?php
/**
* Open Source Initiative OSI - The MIT License (MIT):Licensing
* 
* The MIT License (MIT)
* Copyright (c) 2009 - 2011 Pulse Storm LLC
* 
* Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
* 
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
* 
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
class Alanstormdotcom_Systemsearch_Adminhtml_AlanstormdotcomsystemsearchController extends Mage_Adminhtml_Controller_Action {        	
	protected $_publicActions = array('index');
	public function indexAction()
	{
		$url = Mage::getModel('adminhtml/url')->getUrl('*/alanstormdotcomsystemsearch/searchForConfig');
		
		var_dump($url);
// 		var_d
		var_dump(Mage::app()->getLocale()->getLocaleCode());
	}
	
	public function searchForConfigAction()
	{
		
		$terms = $this->getRequest()->getParam('search_terms');
		
		$nodes = Mage::getModel('alanstormdotcomsystemsearch/configsearch')
		->searchSystemConfigForTerms($terms);		
		
		Mage::helper('alanstormdotcomsystemsearch/jsonconfigsearch')
		->prepareAndSendResponse($nodes, $terms);
	}	
}
	    
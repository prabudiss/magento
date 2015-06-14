<?php
class Nuvodev_Courses_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
        if(! Mage::helper('customer')->isLoggedIn()){
            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('customer/account/create'));
        }   
        else
        {
        
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Course"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("course", array(
                "label" => $this->__("Course"),
                "title" => $this->__("Course")
		   ));

      $this->renderLayout(); 
        } 
    }

    public function SubscribedAction() {
      
        if(! Mage::helper('customer')->isLoggedIn()){
            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('customer/account/create'));
        }  
        else
        {
        
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Course"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("course", array(
                "label" => $this->__("Course"),
                "title" => $this->__("Course")
		   ));

      $this->renderLayout(); 
        } 
    }
    
    public function ManagedAction() {
      
        if(! Mage::helper('customer')->isLoggedIn()){
            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('customer/account/create'));
        }            
        else
        {
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Course"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
        $breadcrumbs->addCrumb("home", array(
                  "label" => $this->__("Home Page"),
                  "title" => $this->__("Home Page"),
                  "link"  => Mage::getBaseUrl()
                     ));

        $breadcrumbs->addCrumb("course", array(
                  "label" => $this->__("Course"),
                  "title" => $this->__("Course")
                     ));

        $this->renderLayout(); 
        }  
    }

    public function AddtoCartAction() {
      
	  $prod_id = $_REQUEST['prod_id'];
	  if($prod_id == "") {echo "false"; return false;}
		try{	  
			
			$session = Mage::getSingleton('core/session', array('name'=>'frontend'));
			
			$product = Mage::getModel('catalog/product')->setStoreId($store)->load($prod_id);
			$cart = Mage::helper('checkout/cart')->getCart();

			$param = new Varien_Object(array(
				'qty'=> 1,
					));
			 
			$cart->addProduct($product, new Varien_Object($param));
			 
			$session->setLastAddedProductId($product->getId());
			$session->setCartWasUpdated(true);
		 
			$cart->save();
			
			echo "Success";
		}
		catch (Exception $e) {
			$result['result'] = 'error';
			$result['message'] =  $e->getMessage();
			echo json_encode($result);
		}		
    }

    public function GetVideoAction() {

      $type = $_REQUEST['type'];
      $pid = $_REQUEST['prod_id'];
      $index = $_REQUEST['index'];

      switch ($type)
      {
          case 1: //GET VIDEO TAG
          {
            $book = Mage::getModel('courses/book');
            $book->getVideoTag($pid, $index);
            break;
          }
          default :
          {
            echo "Something went wrong, please try again later!!!!";
            break;
          }
      }
    }     
}
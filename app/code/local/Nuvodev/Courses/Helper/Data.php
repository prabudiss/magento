<?php
class Nuvodev_Courses_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getCategoryList()
    {
       $helper = Mage::helper('catalog/category'); 
        $categories = $helper->getStoreCategories(); 

        if (count($categories) > 0):
            foreach($categories as $category):
                $category_html .= ' <li><a href="'.$helper->getCategoryUrl($category).'"><span>'.$category->getName().'</span></a></li>';
            endforeach;
        endif;
        
        return $category_html;
    }
    
    public function getYoutubeCode($video_url)
    {
        if(strpos($video_url, "v="))
        {
            $youtube_code = explode("=", $video_url);
            $vid_code = $youtube_code[1];
        }
        else if(strpos($video_url,"youto.be"))
        {
            $youtube_code = explode("/", $video_url);
            $vid_code = $youtube_code[4];

        }
        return $vid_code;
    }

    public function getBookId($_product)
    {
        if ($_product->getParentId() == "")
        {
            return $_product;
        }
        else
        {
            $_product = Mage::getModel('catalog/product')->load($_product->getParentId());
            return $_product;
        }
    }

    public function getChapter($_product) {

        if ($_product->getParentId() == "") {
            //Get first rel Product;
            $allRelatedProductIds = $_product->getRelatedProductIds();

            if (null != $allRelatedProductIds) {
                $_product  = Mage::getModel('catalog/product')->load($allRelatedProductIds[0]);
                return $_product;
            }

            return null;

        }
        else {
            return $_product;
        }

    }    
}
	 
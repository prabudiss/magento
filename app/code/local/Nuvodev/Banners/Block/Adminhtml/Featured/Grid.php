<?php

class Nuvodev_Banners_Block_Adminhtml_Featured_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("featuredGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("banners/featured")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("banners")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
                                        	$this->addColumn('position', array(
						'header' => Mage::helper('banners')->__('Position'),
						'index' => 'position',
						'type' => 'options',
						'options'=>Nuvodev_Banners_Block_Adminhtml_Featured_Grid::getOptionArray7(),				
						));
						
				$this->addColumn("product_id", array(
				"header" => Mage::helper("banners")->__("Product Id"),
				"index" => "product_id",
				));
						$this->addColumn('status', array(
						'header' => Mage::helper('banners')->__('Status'),
						'index' => 'status',
						'type' => 'options',
						'options'=>Nuvodev_Banners_Block_Adminhtml_Featured_Grid::getOptionArray11(),				
						));
						
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_featured', array(
					 'label'=> Mage::helper('banners')->__('Remove Featured'),
					 'url'  => $this->getUrl('*/adminhtml_featured/massRemove'),
					 'confirm' => Mage::helper('banners')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray7()
		{
            $data_array=array(); 
			$data_array[1]='1';
                        $data_array[2]='2';
                        $data_array[3]='3';
                        $data_array[4]='4';
                        $data_array[5]='5';
                        $data_array[6]='6';
                        $data_array[7]='7';
                        $data_array[8]='8';
                        $data_array[9]='9';
            return($data_array);
		}
		static public function getValueArray7()
		{
            $data_array=array();
			foreach(Nuvodev_Banners_Block_Adminhtml_Featured_Grid::getOptionArray7() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray11()
		{
            $data_array=array(); 
			$data_array[0]='Disabled';
			$data_array[1]='Enabled';
            return($data_array);
		}
		static public function getValueArray11()
		{
            $data_array=array();
			foreach(Nuvodev_Banners_Block_Adminhtml_Featured_Grid::getOptionArray11() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}
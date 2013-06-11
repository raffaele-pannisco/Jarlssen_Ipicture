<?php

class Jarlssen_Ipicture_Block_Adminhtml_Form_Edit_CustomIpicture extends Varien_Data_Form_Element_Abstract
{
    public function __construct($attributes=array())
    {
        parent::__construct($attributes);
        $this->setType('label');
    }

    public function getElementHtml()
    {
        $model = Mage::getModel('ipicture/ipicture')->load(1);
        $html = '
            <div id="iPicture">
                <div class="slide">
                    <div id="picture1"></div>
                </div>
                <br/>
            </div>
            
            <script>
            
            jQuery(document).ready(function(){
                jQuery("#iPicture").css(
                    {
                    "background": "url(\''.Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'ipicture/home/'.$model->getIpictureImageUrl().'\') no-repeat scroll 0 0 #393737",
                    "width": "'.$model->getIpictureImageWidth().'px",
                    "height": "'.$model->getIpictureImageHeight().'px",
                    "position": "relative", 
                    "margin":"0px auto",
                }
                );
                
                jQuery( "#iPicture" ).iPicture({';
                if($model->getIpictureAnnotationData()==NULL)
                    $html .= 'animation: true, animationType: "ltr-slide", pictures:["picture1"], animationBg: "bgblack", button: "moreblack", moreInfos:{"picture1":[]}';
                else
                    $html .=$model->getIpictureAnnotationData();
                    
                 $html .=',
                    modify: true
                });
                jQuery("#picture1").css(
                    {
                    "height": "'.$model->getIpictureImageHeight().'px",
                }
                );
                
            });
            </script>
            
        ';
        
        $html.= $this->getAfterElementHtml();
      
        return $html;
    }

    public function getLabelHtml($idSuffix = ''){
        if (!is_null($this->getLabel())) {
            $html = '<label for="'.$this->getHtmlId() . $idSuffix . '" style="'.$this->getLabelStyle().'">'.$this->getLabel()
                . ( $this->getRequired() ? ' <span class="required">*</span>' : '' ).'</label>'."\n";
        }
        else {
            $html = '';
        }
        return $html;
    }
}

?>

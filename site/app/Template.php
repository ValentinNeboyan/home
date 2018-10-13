<?php
class Template
{
    public function  render($template, $variables[], $toVariable=false){
        $result="Template{$template} is not exist";

        if($this->isTemplateexists($template)){
            ob_start();
            require_once($template);
            $content=ob_get_clean();
                   }
    }

private function setVariables($content, $variables){

        return str_replace(array_keys($variables))

                }


}

<?php

class Template
{
    /**
    * @param string $template
    * @param array $variables
    * @param bool $toVariable
    * @return bool|string
    */
    public function render($template, $variables = [], $toVariable = false) {
        $result = "Template {$template} is not exists.";

        if ($this->isTemplateExists($template)) {
            ob_start();
            require_once($template);
            $content = ob_get_clean();
            $result = $this->setVariables($content, $variables);
        }

        if ($toVariable) {
            return $result;
        }

        echo $result;
        return true;
    }

    /**
    * @param string $content
    * @param array $variables
    * @return mixed
    */
    private function setVariables($content, $variables) {
        return str_replace(array_keys($variables), array_values($variables), $content);
    }

    /**
    * @param string $template
    * @return bool
    */
    private function isTemplateExists($template) {
        return file_exists($template);
    }
}
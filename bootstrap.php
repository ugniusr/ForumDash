<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initView()
    {
        $theme = 'default';
        if (isset($this->config->app->theme)) {
            $theme = $this->config->app->theme;
        }
        $path = PUBLIC_PATH.'/themes/'.$theme.'/templates';

        $layout = Zend_Layout::startMvc()
            ->setLayout('layout')
            ->setLayoutPath($path)
            ->setContentKey('content');

        $view = new Zend_View();
        $view->setBasePath($path);
        $view->setScriptPath($path);

        return $view;
    }
}
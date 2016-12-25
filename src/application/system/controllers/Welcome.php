<?php

/**
 * Class Welcome
 * @author ntd1712
 */
class Welcome extends \Shared\Classes\Controller
{
    /**
     * Single-page application
     */
    public function index_get()
    {
        $this->load->view($this->getConfig()->get('app.theme') . '/app.blade.php', ['config' => $this->getConfig()]);
    }
}
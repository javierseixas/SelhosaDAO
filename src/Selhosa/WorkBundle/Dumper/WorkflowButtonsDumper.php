<?php

namespace Selhosa\WorkBundle\Dumper;

class WorkflowButtonsDumper
{

    private $statusTemplates;

    public function __construct($statusTemplates)
    {
        $this->statusTemplates = $statusTemplates;
    }

    public function getTemplate($currentStatus)
    {
        return isset($this->statusTemplates[$currentStatus]) ? $this->statusTemplates[$currentStatus] : null;
    }

    public function dumpButtonTemplate($statusId)
    {
        switch ($statusId) {
            case 10:
                break;
            case 20:
                break;
            case 30:
                break;
            case 40:
                break;
            case 50:
                break;
            case 60:
                break;
            default:
                break;
        }
    }



}

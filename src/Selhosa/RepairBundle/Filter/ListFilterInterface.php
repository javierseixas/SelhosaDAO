<?php

namespace Selhosa\RepairBundle\Filter;

interface ListFilterInterface
{
    function getResult();

    function buildQuery();
}

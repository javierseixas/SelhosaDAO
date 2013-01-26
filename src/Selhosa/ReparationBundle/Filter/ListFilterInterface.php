<?php

namespace Selhosa\ReparationBundle\Filter;

interface ListFilterInterface
{
    function getResult();

    function buildQuery();
}

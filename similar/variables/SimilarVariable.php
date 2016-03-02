<?php
/**
 * Similar plugin for Craft CMS
 *
 * Similar Variables
 *
 * @author    André Elvan
 * @copyright Copyright (c) 2016 André Elvan
 * @link      http://vaersaagod.no
 * @package   Similar
 * @since     2.5
 */

namespace Craft;

class SimilarVariable
{
    /**
     * @param $element
     * @param $relatedElements
     * @param null $criteria
     * @return mixed
     */
    public function find($data)
    {
        return craft()->similar->find($data);
    }
}
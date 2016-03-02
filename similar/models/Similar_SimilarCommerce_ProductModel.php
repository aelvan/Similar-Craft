<?php
/**
 * Similar plugin for Craft CMS
 *
 * Similar_SimilarCommerce_Product Model
 *
 * @author    André Elvan
 * @copyright Copyright (c) 2016 André Elvan
 * @link      http://vaersaagod.no
 * @package   Similar
 * @since     2.5
 */

namespace Craft;

class Similar_SimilarCommerce_ProductModel extends Commerce_ProductModel
{
    protected $strictAttributes = false;

    /**
     * @param null $result
     * @return array
     */
    public static function populateModels($result = null)
    {
        $models = [];
        foreach ($result as $value) {
            $model = self::populateModel($value);
            $model['count'] = $value['count'];
            $models[] = $model;
        }
        
        return $models;
    }

}
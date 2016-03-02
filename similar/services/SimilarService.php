<?php
/**
 * Similar plugin for Craft CMS
 *
 * Similar Service
 *
 * @author    André Elvan
 * @copyright Copyright (c) 2016 André Elvan
 * @link      http://vaersaagod.no
 * @package   Similar
 * @since     2.5
 */

namespace Craft;

class SimilarService extends BaseApplicationComponent
{
    /**
     * @param $element
     * @param $relatedElements
     * @param null $criteria
     * @return array
     */
    public function find($data)
    {
        if (!isset($data['element'])) {
            throw new Exception("Required parameter `element` was not supplied to `craft.similar.find`.");
        }
        
        if (!isset($data['context'])) {
            throw new Exception("Required parameter `context` was not supplied to `craft.similar.find`.");
        }
        
        $element = $data['element'];
        $context = $data['context'];
        $criteria = isset($data['criteria']) ? $data['criteria'] : null;
        
        if ($criteria == null) { // no criteria supplied, get an empty one
          $criteria = craft()->elements->getCriteria($element->elementType);  
        } 
        
        $query = craft()->elements->buildElementsQuery($criteria);
        
        if (!$query) { // no results
            return EntryModel::populateModels(null);
        }
        
        $preOrder = $query->getOrder();
        
        if (is_array($context)) {
            $tagIds = $context;
        } else {
            $tagIds = $context->ids();
        }
        
        $query->addSelect('COUNT(*) as count');
        $query->andWhere('elements.id != :id', array('id'=>$element->id));
        $query->andWhere(array('in', '{{relations}}.targetId', $tagIds));
        $query->join('relations', 'elements.id={{relations}}.sourceId');
        $query->group('{{relations}}.sourceId');
        $query->order('count DESC, ' . str_replace('`', '', $preOrder));
        $result = $query->queryAll();
        
        $modelname = '\Craft\Similar_Similar'.$element->elementType.'Model';
        
        return $modelname::populateModels($result);
    }

}
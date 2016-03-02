<?php
/**
 * Similar plugin for Craft CMS
 *
 * Similar
 *
 * @author    André Elvan
 * @copyright Copyright (c) 2016 André Elvan
 * @link      http://vaersaagod.no
 * @package   Similar
 * @since     2.5
 */

namespace Craft;

class SimilarPlugin extends BasePlugin
{
    protected $_version = '1.0.0',
      $_schemaVersion = '1.0.0',
      $_name = 'Similar',
      $_url = 'https://github.com/aelvan/Similar-Craft',
      $_releaseFeedUrl = 'https://raw.githubusercontent.com/aelvan/Similar-Craft/master/releases.json',
      $_documentationUrl = 'https://github.com/aelvan/Similar-Craft/blob/master/README.md',
      $_description = 'Find similar elements',
      $_developer = 'André Elvan',
      $_developerUrl = 'http://vaersaagod.no/',
      $_minVersion = '2.5';
    
    public function getName()
    {
        return Craft::t($this->_name);
    }

    public function getUrl()
    {
        return $this->_url;
    }

    public function getVersion()
    {
        return $this->_version;
    }

    public function getDeveloper()
    {
        return $this->_developer;
    }

    public function getDeveloperUrl()
    {
        return $this->_developerUrl;
    }

    public function getDescription()
    {
        return $this->_description;
    }

    public function getDocumentationUrl()
    {
        return $this->_documentationUrl;
    }

    public function getSchemaVersion()
    {
        return $this->_schemaVersion;
    }

    public function getReleaseFeedUrl()
    {
        return $this->_releaseFeedUrl;
    }

    public function getCraftRequiredVersion()
    {
        return $this->_minVersion;
    }

    public function hasCpSection()
    {
        return false;
    }

}
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class SiteInfo extends CI_Model 
{
    private $tableName = "site_info";
    
    public function update()
    {
        $data = array(
        );

        $this->db->update($this->tableName, $data);
    }

    public function getSiteInfo()
    {
        $siteInfo = $this->db->get($this->tableName)->result();

        return $siteInfo != null ? $this->fromDb($siteInfo) : null;
    }

    public function fromPost($post)
    {
    }

    public function fromDb($savedSiteInfo)
    {
        return $this;
    }
}
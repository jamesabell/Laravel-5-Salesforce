<?php namespace Davispeixoto\Laravel5Salesforce;

use Davispeixoto\ForceDotComToolkitForPhp\SforceEnterpriseClient as Client;
use Illuminate\Config\Repository;
use Exception;

/**
 * Class Salesforce
 * @package Davispeixoto\Laravel5Salesforce
 *
 * The Salesforce service accessor Constructor
 */
class Salesforce
{
    public $sfh;

    public function __construct(Repository $configExternal)
    {
        try {
            $this->sfh = new Client();

            $wsdl = $configExternal->get('salesforce.wsdl');

            if (empty($wsdl)) {
                $wsdl = __DIR__ . '/Wsdl/enterprise.wsdl.xml';
            }

            $this->sfh->createConnection($wsdl);

            $user = $configExternal->get('salesforce.username');
            $pass = $configExternal->get('salesforce.password');
            $token = $configExternal->get('salesforce.token');

            $this->sfh->login($user, $pass . $token);

            return $this;
        } catch (Exception $e) {
            throw new Exception('Exception no Construtor' . $e->getMessage() . "\n\n" . $e->getTraceAsString());
        }
    }

    /*
     * Enterprise client functions
     */
    public function create($sObjects, $type)
    {
        return $this->sfh->create($sObjects, $type);
    }

    public function update($sObjects, $type, $assignment_header = null, $mru_header = null)
    {
        return $this->sfh->update($sObjects, $type, $assignment_header, $mru_header);
    }

    public function upsert($ext_Id, $sObjects, $type = 'Contact')
    {
        return $this->sfh->upsert($ext_Id, $sObjects, $type);
    }

    public function merge($mergeRequest, $type)
    {
        return $this->sfh->merge($mergeRequest, $type);
    }

    /*
     * Base Client functions
     */
    public function getNamespace()
    {
        return $this->sfh->getNamespace();
    }

    public function printDebugInfo()
    {
        $this->sfh->printDebugInfo();
    }

    public function createConnection($wsdl, $proxy = null, $soap_options = array())
    {
        return $this->sfh->createConnection($wsdl, $proxy, $soap_options);
    }

    public function setCallOptions($header)
    {
        $this->sfh->setCallOptions($header);
    }

    public function login($username, $password)
    {
        return $this->sfh->login($username, $password);
    }

    public function logout()
    {
        return $this->sfh->logout();
    }

    public function invalidateSessions()
    {
        return $this->sfh->invalidateSessions();
    }

    public function setEndpoint($location)
    {
        $this->sfh->setEndpoint($location);
    }

    public function setAssignmentRuleHeader($header)
    {
        $this->sfh->setAssignmentRuleHeader($header);
    }

    public function setEmailHeader($header)
    {
        $this->sfh->setEmailHeader($header);
    }

    public function setLoginScopeHeader($header)
    {
        $this->sfh->setLoginScopeHeader($header);
    }

    public function setMruHeader($header)
    {
        $this->sfh->setMruHeader($header);
    }

    public function setSessionHeader($id)
    {
        $this->sfh->setSessionHeader($id);
    }

    public function setUserTerritoryDeleteHeader($header)
    {
        $this->sfh->setUserTerritoryDeleteHeader($header);
    }

    public function setQueryOptions($header)
    {
        $this->sfh->setQueryOptions($header);
    }

    public function setAllowFieldTruncationHeader($header)
    {
        $this->sfh->setAllowFieldTruncationHeader($header);
    }

    public function setLocaleOptions($header)
    {
        $this->sfh->setLocaleOptions($header);
    }

    public function setPackageVersionHeader($header)
    {
        $this->sfh->setPackageVersionHeader($header);
    }

    public function getSessionId()
    {
        return $this->sfh->getSessionId();
    }

    public function getLocation()
    {
        return $this->sfh->getLocation();
    }

    public function getConnection()
    {
        return $this->sfh->getConnection();
    }

    public function getFunctions()
    {
        return $this->sfh->getFunctions();
    }

    public function getTypes()
    {
        return $this->sfh->getTypes();
    }

    public function getLastRequest()
    {
        return $this->sfh->getLastRequest();
    }

    public function getLastRequestHeaders()
    {
        return $this->sfh->getLastRequestHeaders();
    }

    public function getLastResponse()
    {
        return $this->sfh->getLastResponse();
    }

    public function getLastResponseHeaders()
    {
        return $this->sfh->getLastResponseHeaders();
    }

    public function sendSingleEmail($request)
    {
        return $this->sfh->sendSingleEmail($request);
    }

    public function sendMassEmail($request)
    {
        return $this->sfh->sendMassEmail($request);
    }

    public function convertLead($leadConverts)
    {
        return $this->sfh->convertLead($leadConverts);
    }

    public function delete($ids)
    {
        return $this->sfh->delete($ids);
    }

    public function undelete($ids)
    {
        return $this->sfh->undelete($ids);
    }

    public function emptyRecycleBin($ids)
    {
        return $this->sfh->emptyRecycleBin($ids);
    }

    public function processSubmitRequest($processRequestArray)
    {
        return $this->sfh->processSubmitRequest($processRequestArray);
    }

    public function processWorkitemRequest($processRequestArray)
    {
        return $this->sfh->processWorkitemRequest($processRequestArray);
    }

    public function describeGlobal()
    {
        return $this->sfh->describeGlobal();
    }

    public function describeLayout($type, array $recordTypeIds = null)
    {
        return $this->sfh->describeLayout($type, $recordTypeIds);
    }

    public function describeSObject($type)
    {
        return $this->sfh->describeSObject($type);
    }

    public function describeSObjects($arrayOfTypes)
    {
        return $this->sfh->describeSObjects($arrayOfTypes);
    }

    public function describeTabs()
    {
        return $this->sfh->describeTabs();
    }

    public function describeDataCategoryGroups($sObjectType)
    {
        return $this->sfh->describeDataCategoryGroups($sObjectType);
    }

    public function describeDataCategoryGroupStructures(array $pairs, $topCategoriesOnly)
    {
        return $this->sfh->describeDataCategoryGroupStructures($pairs, $topCategoriesOnly);
    }

    public function getDeleted($type, $startDate, $endDate)
    {
        return $this->sfh->getDeleted($type, $startDate, $endDate);
    }

    public function getUpdated($type, $startDate, $endDate)
    {
        return $this->sfh->getUpdated($type, $startDate, $endDate);
    }

    public function query($query)
    {
        return $this->sfh->query($query);
    }

    public function queryMore($queryLocator)
    {
        return $this->sfh->queryMore($queryLocator);
    }

    public function queryAll($query, $queryOptions = null)
    {
        return $this->sfh->queryAll($query, $queryOptions);
    }

    public function retrieve($fieldList, $sObjectType, $ids)
    {
        return $this->sfh->retrieve($fieldList, $sObjectType, $ids);
    }

    public function search($searchString)
    {
        return $this->sfh->search($searchString);
    }

    public function getServerTimestamp()
    {
        return $this->sfh->getServerTimestamp();
    }

    public function getUserInfo()
    {
        return $this->sfh->getUserInfo();
    }

    public function setPassword($userId, $password)
    {
        return $this->sfh->setPassword($userId, $password);
    }

    public function resetPassword($userId)
    {
        return $this->sfh->resetPassword($userId);
    }

    /*
     * Debugging functions
     */
    public function dump()
    {
        return print_r($this, true);
    }
}

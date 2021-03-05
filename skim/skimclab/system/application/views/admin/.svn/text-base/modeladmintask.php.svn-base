<?php
		class Modeladmintask extends model{
			function Modeladmintask(){
				parent::Model();
			}

			function getMaxGroupId(){
				$sqlQuery = "SELECT MAX(group_id) as maxid from groups;";
				$maxGroupId = $this->db->query($sqlQuery);
				$maxGroupIdRow = $maxGroupId->row();

				return $maxGroupIdRow->maxid;
			}

			function getMaxEntityId(){
				$sqlQuery = "SELECT MAX(entity_id) as maxid from entities;";
				$maxEntityId = $this->db->query($sqlQuery);
				$maxEntityIdRow = $maxEntityId->row();

				return $maxEntityIdRow->maxid;
			}

			function getMaxEntityLinkID(){
				$sqlQuery = "SELECT MAX(entitylink_id) as maxid from entitylinks;";
				$maxEntityLinkId = $this->db->query($sqlQuery);
				$maxEntityLinkIdRow = $maxEntityLinkId->row();

				return $maxEntityLinkIdRow->maxid;
			}

			function getAllGroups(){
				$sqlQuery = "SELECT * from groups;";
				return $this->db->query($sqlQuery);
			}

			function getAllEntities(){
				$sqlQuery = "SELECT * FROM entities ORDER BY entity_type;";
				return $this->db->query($sqlQuery);
			}

			function getAllSitemaps(){
				$sqlQuery = "SELECT DISTINCT(sitemap_name), sitemap_category  FROM sitemaps ORDER BY sitemap_category;";
				return $this->db->query($sqlQuery);
			}

			function getReport($dateFrom, $dateTo, $tablename){
				$dateFrom = date("Y-m-d", strtotime($dateFrom));
				$dateTo = date("Y-m-d", strtotime($dateTo));
				if($tablename == "groups"){
					$fieldDate = "group_createddate";
				}
				else if($tablename == "entities"){
					$fieldDate = "entity_createddate";
				}
				else
				{
					$fieldDate = "user_createddate";
				}
				$sqlQuery = "SELECT * FROM " . $tablename;

				if($dateFrom){
					$sqlQuery .= " WHERE $fieldDate > '$dateFrom' AND $fieldDate < '$dateTo';";
				}

				return $this->db->query($sqlQuery);
			}

			function logActivity($module, $tablename, $action, $loginid){
				$getLogIdQuery = "SELECT MAX(log_id) as logid from logs";
				$logIdRecordSet = $this->db->query($getLogIdQuery);
				$logIdRow = $logIdRecordSet->row();
				$logid = $logIdRow->logid + 1;
				//$now = date("Y-m-d",time());
				$now = date("Y-m-d H:i:s", time());

				$insertLogQuery = "INSERT INTO logs (log_id, log_datetime, log_module, log_tablename, log_action, log_loginid)";
				$insertLogQuery .= " VALUES($logid, ".$this->db->escape($now).", '$module', '$tablename', '$action', $loginid);";

				$this->db->query($insertLogQuery);
			}

			function getMaxGroupSitemapID(){
				$sqlQuery = "SELECT MAX(groupsitemap_id) as maxid from groupsitemaps;";
				$maxGroupSitemapId = $this->db->query($sqlQuery);
				$maxGroupSitemapIdRow = $maxGroupSitemapId->row();

				return $maxGroupSitemapIdRow->maxid;
			}

			function checkAccessRight($groupid, $currentUri){
				$sqlQuery = "SELECT groupsitemaps.*, sitemaps.* FROM groupsitemaps INNER JOIN sitemaps ON sitemaps.sitemap_name = groupsitemaps.groupsitemap_sitemap_name";
				$sqlQuery .= " WHERE groupsitemaps.groupsitemap_group_id = $groupid AND sitemaps.sitemap_url = '$currentUri';";

				$sitemapGroup = $this->db->query($sqlQuery);

				if($sitemapGroup->num_rows() > 0) return 1;
				else return 0;
			}

			function getLoginDetailsByLoginID($loginid){
				$sqlQuery = "SELECT login.*, users.user_name FROM login
							 LEFT JOIN users ON users.user_id = login.login_user_id
							 WHERE login.login_id = $loginid";
				$loginRecord = $this->db->query($sqlQuery);
				return $loginRecord->row();
			}

			function getEntityLinksByLoginID($loginid){
				$sqlQuery = "SELECT * FROM entitylinks WHERE entitylink_login_id = $loginid";
				return $this->db->query($sqlQuery);
			}
		}
?>

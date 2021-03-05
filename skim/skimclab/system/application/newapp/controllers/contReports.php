<?php
	class ContReports extends Controller {
		function ContReports(){
			parent::Controller();
			$this->load->Model('ModelReports');
			$this->load->Model('ModelLabour');
			$this->load->Model('ModelContractor');
			$this->load->Model('ModelSpim');
			$this->load->database();
		}
		
		function index(){
			$this->load->view('underconstruction.htm');	
		}
		
		function reportsDashbrd(){
			$data['totalWorkorders'] = $this->ModelSpim->getWorkordersByStatus("overall", "sum");
			$data['totalLabours'] = $this->ModelLabour->getTotalLaboursByStatus('', 0, 'total');
			$data['totalCtr'] = $this->ModelContractor->getTotalContractors();
			$data['totalEmp'] = $this->ModelReports->getTotalEmployees();
			
			$this->load->view('reports/reports_dashbrd', $data);	
		}
		
		function ctrReports(){
			$data['allStatus'] = $this->ModelReports->getAllStatus();
			$data['allStatus2'] = $this->ModelReports->getAllStatus2();
			$data['allGrades'] = $this->ModelReports->getAllGrades();
			$data['allStates'] = $this->ModelReports->getAllStates();
			$this->load->view('reports/ctr_reports', $data);
		}
		
		function ctrReportSearch(){
			$status = $this->uri->segment(3);
			
			$grade = $this->uri->segment(4);
			$state = $this->uri->segment(5);
			$reportType = $this->uri->segment(6);
			
			$data['searchStatus'] = $this->ModelReports->getStatusByStatusID($status);
			
			if($grade == '0') $data['searchGrade'] = "All";
			else $data['searchGrade'] = $grade;
			$data['searchState'] = $this->ModelReports->getStateByStateID($state);
			
			$data['ctrData'] = $this->ModelReports->getContractors($status, $grade, $state);
			$data['excel'] = $reportType;
			$this->load->view('reports/ctr_reports_bygrade', $data);
		}
		
		function ctrSummaryReport(){
			$reportType = $this->uri->segment(3);
			
			$data['ctrSummary'] = $this->ModelReports->getCtrGradeSummary('G');
			$data['others'] = $this->ModelReports->getCtrGradeSummary('OTH');
			$data['excel'] = $reportType;
			$this->load->view('reports/ctr_reports_summary', $data);	
		}
		
		function viewFCLReports(){
			$data['allCountries'] = $this->ModelLabour->getAllCountries();
			$data['allworktrade'] = $this->ModelLabour->getAllWorkTrade();
			$data['allContractors'] = $this->ModelLabour->getAllContractors();
			
			$this->load->view('reports/labour_reports', $data);
		}
		
		function wkrReportSearch(){
			$reportType = $this->uri->segment(3);
			$outputType = $this->uri->segment(4);
			$data['excel'] = $outputType;
			
			if($reportType == 'wkr_state'){
				$data['reportTitle'] = "DISTRIBUTION OF FCL BY LOCATION";
				$data['fieldTitle'] = "STATE";
				$data['wkrRecord'] = $this->ModelReports->getFCLByStatus($reportType);
				$this->load->view('reports/labour_reports_byStateCtyTrade', $data);
			}
			else if($reportType == 'wkr_country'){
				$data['reportTitle'] = "FCL STATUS BY SOURCE COUNTRY";
				$data['fieldTitle'] = "COUNTRY";
				$data['wkrRecord'] = $this->ModelReports->getFCLByStatus($reportType);
				$this->load->view('reports/labour_reports_byStateCtyTrade', $data);
			}
			else if($reportType == 'wkr_wtrade'){
				$data['reportTitle'] = "FCL Status by Work Trade";
				$workTradeList = $this->ModelLabour->getAllWorkTrade();
				$htmlCode = "";
				$i = 1;
				foreach($workTradeList->result() as $wTrade){
					$totalWorkers = $this->ModelReports->getFCLByTrade($wTrade->trade_id);
					$htmlCode .= "<tr>
									<td class=\"print\">$i</td>
									<td class=\"print\">$wTrade->trade_id : $wTrade->trade_desc</td>
									<td class=\"print\" align=\"RIGHT\">$totalWorkers</td>
					             </tr>";
					$i++;
				}
				$data['fclListCodes'] = $htmlCode;
				$this->load->view('reports/labour_reports_bytrade', $data);
			}
			else{
				//do nothing	
			}
		}
		
		function getWkrListReport(){
			$wkr_currentemp = $this->uri->segment(3);
			$wkr_status = $this->uri->segment(4);
			$wkr_transtatus = $this->uri->segment(5);
			$wkr_trade = $this->uri->segment(6);
			$wkr_country = $this->uri->segment(7);
			$isExcel = $this->uri->segment(8);
			$wkr_permitexp_from = trim($this->uri->segment(9));
			$wkr_permitexp_to = trim($this->uri->segment(10));
			
			
			$data['wkrData'] = $this->ModelReports->getFCLListBySearchCriteria($wkr_currentemp, $wkr_status, $wkr_transtatus, $wkr_trade, $wkr_country, $wkr_permitexp_from, $wkr_permitexp_to);
			$data['reportTitle'] = "FCL List";
			$data['company'] = ($wkr_currentemp == '0')?'All':$this->ModelContractor->getCtrNameByClabNo($wkr_currentemp);
			$data['status'] = ($wkr_status == '0')?'All':$this->ModelContractor->getStatusByStatusID($wkr_status);
			$data['country'] = ($wkr_country == '0')?'All':$this->ModelLabour->getCtyByCtyID($wkr_country);
			$data['wtrade'] = ($wkr_trade == '0')?'All':$wkr_trade;
			$data['permitexp_from'] = (strlen($wkr_permitexp_from)>0)?date('d-m-Y', strtotime($wkr_permitexp_from)):'-';
			$data['permitexp_to'] = (strlen($wkr_permitexp_to)>0)?date('d-m-Y', strtotime($wkr_permitexp_to)):'-';
			$data['excel'] = $isExcel;
			
			$this->load->view('reports/labour_reports_wkrlist', $data);
		}
	}
?>
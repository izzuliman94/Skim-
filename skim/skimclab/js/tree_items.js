var TREE_ITEMS = [
	['SIPPS', '',
		['Call', '/sipps/index.php/contCallDashboard',
			['District Dashboard', '/sipps/index.php/contCallDashboard/districtCallDashbrd'],
			['Letter Generation', '/sipps/index.php/contCallDashboard/letterGeneration'],
			['Print Reporting', '/sipps/index.php/contCallDashboard/listCallReports'],
		],

		['Recall', '/sipps/index.php/contRecallDashboard',
			['Letter Generation', '/sipps/index.php/contRecallDashboard/letterGenerationView'],
			['Print Reporting', '/sipps/index.php/contRecallDashboard/listRecallReports'],
		],
		['Client', '/sipps/index.php/contClient/clientDashboard',
			['Add Client', '/sipps/index.php/contClient/addClientView'],
			['Clients List', '/sipps/index.php/contClient/filterListClients'],
			['Edit Recall Status', '/sipps/index.php/contClient/editClientDataView'],
			['Client Response', '/sipps/index.php/contClient/clientResponseView'],
			['View Clinical Data', '/sipps/index.php/contClient/clinicalDataview'],
		],
		['Clinic', '/sipps/index.php/contClinic/clinicDashbrdEntityBased',
			['Client Visit', '/sipps/index.php/contClinic/clientVisitView'],
			['Clinical Summary', '/sipps/index.php/contClinic/clinicalSummaryMain'],
			['Smear Sample Adequacy', '/sipps/index.php/contClinic/slidesResultView'],
			['Results Verification', '/sipps/index.php/contClinic/resultVerificationView'],
		],
		['Lab', '/sipps/index.php/contLab',
			['Smear Results', '/sipps/index.php/contLab/slidesResult'],
			['Closed Tests', '/sipps/index.php/contLab/listClosedTest'],
		],
		['Reports', '/sipps/index.php/contReports/viewReportDashbrd',
			['Call', '/sipps/index.php/contReports/callReportView'],
			['Recall', '/sipps/index.php/contReports/recallReportView'],
			['Clinic', '/sipps/index.php/contReports/clinicReportView'],
			['Lab', '/sipps/index.php/contReports/labReportView'],
			['Data Import', '/sipps/index.php/contReports/dataImportReportView'],
			['System Administration', '/sipps/index.php/contReports/adminReportView'],
		],
		['System Administration', '/sipps/index.php/contSystemAdmin/sysAdminDashbrd',
			['Add Login', '/sipps/index.php/contSystemAdmin/newLogin'],
			['Users List', '/sipps/index.php/contSystemAdmin/filterListUsers'],
			['Add Group', '/sipps/index.php/contSystemAdmin/newGroup'],
			['Groups List', '/sipps/index.php/contSystemAdmin/filterListGroups'],
			['Add Facility', '/sipps/index.php/contSystemAdmin/newEntity'],
			['Facilities List', '/sipps/index.php/contSystemAdmin/filterListEntities'],
			['Import Data', '/sipps/index.php/contImport'],
		],
		['Logout', '/sipps/index.php/contLogout/logout',

		],
	],
];

	function fillCategory(){
		 // this function is used to fill the category list on load
		addOption(document.wkrlist_report.selstatus, "0", "All", "");
		addOption(document.wkrlist_report.selstatus, "1", "Active", "");
		addOption(document.wkrlist_report.selstatus, "2", "Inactive","");
		addOption(document.wkrlist_report.selstatus, "3", "Suspended", "");
	}
	
	function SelectSubCat(){
		// ON selection of category this function will work
		
		removeAllOptions(document.wkrlist_report.sel_substatus);
		
		if(document.wkrlist_report.selstatus.value == '1'){
			addOption(document.wkrlist_report.sel_substatus, "0", "All");
			addOption(document.wkrlist_report.sel_substatus, "1","Registered");
			addOption(document.wkrlist_report.sel_substatus, "2","Accepted");
			addOption(document.wkrlist_report.sel_substatus, "4","Available");
			addOption(document.wkrlist_report.sel_substatus, "6","Booked");
			addOption(document.wkrlist_report.sel_substatus, "7","Hired");
		}
		if(document.wkrlist_report.selstatus.value == '2'){
			addOption(document.wkrlist_report.sel_substatus, "0","All");
			addOption(document.wkrlist_report.sel_substatus, "3","Rejected");
			addOption(document.wkrlist_report.sel_substatus, "5","M.I.P");
			addOption(document.wkrlist_report.sel_substatus, "8","Runaway");
			addOption(document.wkrlist_report.sel_substatus, "9","Unknown");
			addOption(document.wkrlist_report.sel_substatus, "10","COM/Deported");
			addOption(document.wkrlist_report.sel_substatus, "11","Death");
			addOption(document.wkrlist_report.sel_substatus, "12","Permit Expired");
			addOption(document.wkrlist_report.sel_substatus, "13","Passport Expired");
			addOption(document.wkrlist_report.sel_substatus, "14","Leave without notice");
			addOption(document.wkrlist_report.sel_substatus, "15","Leave with notice");
			addOption(document.wkrlist_report.sel_substatus, "16","Unfit");
		}
		if(document.wkrlist_report.selstatus.value == '3'){
			addOption(document.wkrlist_report.sel_substatus,"0", "All");
		}
	}
	//////////////////
	
	function removeAllOptions(selectbox)
	{
		var i;
		for(i=selectbox.options.length-1;i>=0;i--)
		{
			//selectbox.options.remove(i);
			selectbox.remove(i);
		}
	}
	
	
	function addOption(selectbox, value, text )
	{
		var optn = document.createElement("OPTION");
		optn.text = text;
		optn.value = value;
	
		selectbox.options.add(optn);
	}

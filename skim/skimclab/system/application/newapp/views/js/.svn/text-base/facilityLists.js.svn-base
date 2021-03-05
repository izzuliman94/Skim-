function fillCategory(){ 
 // this function is used to fill the category list on load
addOption(document.entity_info.entity_type, "Hospital", "Hospital", "");
addOption(document.entity_info.entity_type, "Clinic", "Clinic", "");
addOption(document.entity_info.entity_type, "Lab", "Lab", "");
addOption(document.entity_info.entity_type, "Others", "Others", "");
}

function SelectSubCat(){
// ON selection of category this function will work

removeAllOptions(document.entity_info.entity_affiliation);

if(document.entity_info.entity_type.value == 'Hospital'){
addOption(document.entity_info.entity_affiliation,"Hospital Universiti", "Hospital Universiti");
addOption(document.entity_info.entity_affiliation,"Hospital JHEOA", "Hospital JHEOA");
addOption(document.entity_info.entity_affiliation,"Hospital Angkatan Tentera", "Hospital Angkatan Tentera");
addOption(document.entity_info.entity_affiliation,"Hospital KKM", "Hospital KKM");
addOption(document.entity_info.entity_affiliation,"Hospital Swasta", "Hospital Swasta");
addOption(document.entity_info.entity_affiliation,"Others", "Others");
}
if(document.entity_info.entity_type.value == 'Clinic'){
addOption(document.entity_info.entity_affiliation,"Klinik KKM", "Klinik KKM");
addOption(document.entity_info.entity_affiliation,"Klinik LPPKN ", "Klinik LPPKN ");
addOption(document.entity_info.entity_affiliation,"Klinik PPPKM", "Klinik PPPKM");
addOption(document.entity_info.entity_affiliation,"Klinik Swasta", "Klinik Swasta");
addOption(document.entity_info.entity_affiliation,"Others", "Others");
}
if(document.entity_info.entity_type.value == 'Lab'){
addOption(document.entity_info.entity_affiliation,"Government (MOH)", "Government (MOH)");
addOption(document.entity_info.entity_affiliation,"Government (non-MOH)", "Government (non-MOH)");
addOption(document.entity_info.entity_affiliation,"Private", "Private");
addOption(document.entity_info.entity_affiliation,"Others", "Others");
}
if(document.entity_info.entity_type.value == 'Others'){
addOption(document.entity_info.entity_affiliation,"Others", "Others");
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

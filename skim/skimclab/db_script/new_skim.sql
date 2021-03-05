#Database Schema for SKIM (CLAB)
#MySQL Server 5.0
#
#First created: 2008-09-19
#naming convention: all small
#Foreign Key: [FK: tablename, fieldname]

USE newclabskim;

#========================================
#Table: departments
#========================================
DROP TABLE IF EXISTS departments;
CREATE TABLE departments (
        dpt_id INT(3) NOT NULL AUTO_INCREMENT,
	dpt_name VARCHAR(50) default NULL,
	dpt_description VARCHAR(200) default NULL,
	dpt_createdby INT,				#current user ID (emp_id)
	dpt_createddate DATETIME default '0000-00-00 00:00:00',
	dpt_modifiedby INT,				#current user ID (emp_id)
	dpt_modifieddate DATETIME default '0000-00-00 00:00:00',
	dpt_status INT(2),				#1/0 (active/inactive)
	PRIMARY KEY  (dpt_id)
) TYPE=MyISAM;

#
# Dumping data for table 'departments'
#

INSERT INTO departments (dpt_id, dpt_name) VALUES("1", "OPERATION");
INSERT INTO departments (dpt_id, dpt_name) VALUES("2", "FINANCE");
INSERT INTO departments (dpt_id, dpt_name) VALUES("3", "HUMAN RESOURCES");
INSERT INTO departments (dpt_id, dpt_name) VALUES("4", "ADMIN");
INSERT INTO departments (dpt_id, dpt_name) VALUES("5", "IT");

#========================================
#Table: employees
#========================================
DROP TABLE IF EXISTS employees;
CREATE TABLE employees (
	emp_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	emp_num VARCHAR(10) default NULL,
	emp_name VARCHAR(120) default NULL,
	emp_position VARCHAR(100) default NULL,
	emp_dpt_id INT default NULL,			#[FK: departments]
	emp_extension VARCHAR(50) default NULL,
	emp_workphone VARCHAR(50) default NULL,
	emp_handphone VARCHAR(50) default NULL,
	emp_email VARCHAR(80)default NULL,
	emp_fax VARCHAR(50) default NULL,
	emp_housephone VARCHAR(50) default NULL,
	emp_address VARCHAR(250) default NULL,		#form in old system doesn't record this
	emp_office_location VARCHAR(100) default NULL,
	emp_username VARCHAR(30) NOT NULL,
	emp_password VARCHAR(100) NOT NULL,
	emp_accessibility VARCHAR(20) DEFAULT NULL,
	emp_createdby INT,
	emp_createddate DATETIME default '0000-00-00 00:00:00',
	emp_modifiedby INT,
	emp_modifieddate DATETIME default '0000-00-00 00:00:00',
	emp_status INT(2) default 1,				#1/2/3 (active/inactive/suspended) [FK:mst_emp_status, emp_statusid]
	PRIMARY KEY (emp_id)
) TYPE=MyISAM;

#========================================
#Table: logs
#========================================
DROP TABLE IF EXISTS logs;
CREATE TABLE logs (
	log_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	log_datetime DATETIME default '0000-00-00 00:00:00',
	log_module VARCHAR(30),
	log_tablename VARCHAR(30),
	log_action TEXT,
	log_login_id INT,
	log_status INT,
	PRIMARY KEY (log_id)
) TYPE=MyISAM;

#========================================
#Table: contractors
#========================================
DROP TABLE IF EXISTS contractors;
CREATE TABLE contractors (
	ctr_clab_no VARCHAR(10) NOT NULL default '0',		#auto generated e.g., CLAB000315
	ctr_datereg  DATE default '0000-00-00',
	ctr_comp_name  VARCHAR(250) default NULL,
	ctr_comp_regno  VARCHAR(20) default NULL,
	ctr_addr1  VARCHAR(100) default NULL,
	ctr_addr2 VARCHAR(200) default NULL,
	ctr_addr3 VARCHAR(100) default NULL,
	ctr_pcode  VARCHAR(6) default NULL,
	ctr_state  VARCHAR(10) default NULL,
	ctr_telno  VARCHAR(20) default NULL,
	ctr_telno1  VARCHAR(20) default NULL,
	ctr_fax  VARCHAR(20) default NULL,
	ctr_email  VARCHAR(50) default NULL,
	ctr_cidb_regno  VARCHAR(20) default NULL,
	ctr_grade  CHAR(2) default NULL,			#G1 to G7 [FK: mst_ctr_grade]
	ctr_category  VARCHAR(10) default NULL,			#B - BUILDING CONSTRUCTION, CE - CIVIL ENGINEERING CONSTRUCTION, ME - MECHANICAL AND ELECTRICAL [FK: mst_ctr_category]
	ctr_spec  VARCHAR(100) default NULL,			#contractor's specialization codes [FK: mst_ctr_spec]
	ctr_periodreg  CHAR(1) default NULL,			#Period of registration (1/2/3 years)
	ctr_mbramount  FLOAT default NULL,			#Membership amount
	ctr_paymentype  CHAR(1) default NULL,			#1-cash, 2-cheque/draft/MO
	ctr_cshdate  DATE default '0000-00-00',				
	ctr_chqno  VARCHAR(30) default NULL,
	ctr_chqdate  DATE default '0000-00-00',				
	ctr_recvby  VARCHAR(10) default NULL,			
	ctr_recvdate  DATE default '0000-00-00',				
	ctr_procsby  VARCHAR(100) default NULL,			
	ctr_procdate  DATE default '0000-00-00',
	ctr_appstatus  CHAR(2) default NULL,				#1-open, 2-verified, 3-approved, 4-rejected, 5-withdrawal [FK:Mst_Ctr_Appstatus, appstatus_id]
	ctr_cidbexp_date  DATE default '0000-00-00',
	ctr_clabexp_date  DATE default '0000-00-00',
	ctr_verified  CHAR(1) default NULL,
	ctr_verifiedby  VARCHAR(100) default NULL,
	ctr_verifieddate  DATE default '0000-00-00',
	ctr_approve  CHAR(1) default NULL,
	ctr_app_name  VARCHAR(100) default NULL,
	ctr_app_date  DATE default '0000-00-00',
	ctr_reject  CHAR(1) default NULL,
	ctr_rej_name  VARCHAR(100) default NULL,
	ctr_rej_date  DATE default '0000-00-00',
	ctr_reject_reason  TEXT,					
	ctr_withdrawal  CHAR(1) default NULL,				#withdrawal by
	ctr_withd_name  VARCHAR(100) default NULL,
	ctr_withd_date  DATE default '0000-00-00',
	ctr_attach_form24  CHAR(1) default '0',
	ctr_attach_form49  CHAR(1) default '0',
	ctr_attach_copycidb  CHAR(1) default '0',			
	ctr_attach_iccopy CHAR(1) default '0',
	ctr_attach_others  CHAR(1) default NULL,
	ctr_attach_specify  VARCHAR(200) default NULL,
	ctr_dir_name VARCHAR(250) default NULL,
	ctr_dir_mobileno  VARCHAR(50) default NULL,
	ctr_contact_name VARCHAR(250) default NULL,			#contact person's name
	ctr_contact_desg  VARCHAR(250) default NULL,			#contact person's designation
	ctr_contact_mobileno  VARCHAR(50) default NULL,			#contact person's mobile number
	ctr_status  CHAR(3) default '1',				#1/2/3 (active, inactive, suspended) [FK:mst_emp_status, emp_statusid]
	ctr_insertflag CHAR(1) default '1',				#1-register through CLAB, 2-register online
	PRIMARY KEY (ctr_clab_no)
) TYPE=MyISAM;

#========================================
#Table: ctr_attachdoc
#========================================
DROP TABLE IF EXISTS ctr_attachdoc;
CREATE TABLE ctr_attachdoc (
  	att_id bigint(3) UNSIGNED NOT NULL,
  	att_ctr_id VARCHAR(10) default NULL,			#clab no [FK:contractors]
  	att_filetype VARCHAR(100) default NULL,
  	att_org_filename VARCHAR(100) default NULL,		#original filename
  	att_dest_filename VARCHAR(100) default NULL,		#destination filename
  	att_desturl VARCHAR(200) default NULL,
  	att_uploadby INT(3) DEFAULT NULL,			#current user[FK:employees, emp_id]
  	att_uploaddate DATE DEFAULT '0000-00-00',		#today date
  	PRIMARY KEY  (att_id)
) TYPE=MyISAM;

#========================================
#Table: ctr_payment
#========================================
DROP TABLE IF EXISTS ctr_payment;
CREATE TABLE ctr_payment (
        pay_id INT(5) NOT NULL,
  	pay_ctr_id CHAR(10) NOT NULL default '0',		#clab no [FK:contractors]
  	pay_periodreg CHAR(1) default NULL,
  	pay_amount FLOAT default NULL,
  	pay_type CHAR(1) default NULL,				#1-Cash, 2-Cheque/Draft/MO
  	pay_date DATE default '0000-00-00',
  	pay_chequeno CHAR(30) default NULL,
  	pay_recvby CHAR(100) default NULL,
  	pay_recvdate DATE default '0000-00-00',
  	PRIMARY KEY  (pay_id)
) TYPE=MyISAM;

#========================================
#Table: ctr_changestatus_history
#========================================
DROP TABLE IF EXISTS ctr_changestatus_history;
CREATE TABLE ctr_changestatus_history (
	status_clab_no VARCHAR(10) NOT NULL default '0',		#[FK:contractors, ctr_clab_no]
	status_oldstatus CHAR(3),
	status_newstatus CHAR(3),
	status_changereason TEXT,
	status_changeby VARCHAR (20) default '',
	status_changedate DATE default '0000-00-00',
	KEY (status_clab_no)
) TYPE = MyISAM;

#========================================
#Table: ctr_printletter_history
#========================================
DROP TABLE if exists ctr_printletter_history;
CREATE TABLE ctr_printletter_history(
	print_id INT(8) NOT NULL,
	print_ctr_clabno VARCHAR(10) NOT NULL default '0', 	#[FK: contractors, ctr_clab_no]
	print_date DATE default '0000-00-00',	
	print_by INT(3) default 0,			   	#[FK: employees, emp_id]
	print_doctype VARCHAR(20) default NULL,			#plks- wkr_permitexp,passport - wkr_passexp
	print_docduration VARCHAR(20) default NULL,		#2wks,1mth,2mth,3mth,4mth
	print_isvoid CHAR(1) default '0', 			#0-valid, 1-void
	PRIMARY KEY  (print_id)
) TYPE=MyISAM;
	
#========================================
#Table: mst_ctr_appstatus (contractor application status)
#========================================
DROP TABLE IF EXISTS mst_ctr_appstatus;
CREATE TABLE mst_ctr_appstatus (
	appstatus_id INT(2) UNSIGNED NOT NULL AUTO_INCREMENT,
 	appstatus_desc VARCHAR(50) default NULL,
 	appstatus_createdby INT(3) default NULL,
 	appstatus_createddate DATETIME default '0000-00-00 00:00:00',
  	PRIMARY KEY  (appstatus_id)
) TYPE=MyISAM;

#
# Dumping data for table 'tbl_mst_appstatus'
#

INSERT INTO mst_ctr_appstatus (appstatus_id, appstatus_desc) VALUES("1", "OPEN");
INSERT INTO mst_ctr_appstatus (appstatus_id, appstatus_desc) VALUES("2", "VERIFIED");
INSERT INTO mst_ctr_appstatus (appstatus_id, appstatus_desc) VALUES("3", "APPROVED");
INSERT INTO mst_ctr_appstatus (appstatus_id, appstatus_desc) VALUES("4", "REJECTED");
INSERT INTO mst_ctr_appstatus (appstatus_id, appstatus_desc) VALUES("5", "WITHDRAWAL");

#========================================
#Table: mst_avstatus (Available/request matching status)
#========================================
DROP TABLE IF EXISTS mst_avstatus;
CREATE TABLE mst_avstatus (
	avstatus_id INT(2) UNSIGNED NOT NULL AUTO_INCREMENT,
 	avstatus_desc VARCHAR(50) default NULL,
 	avstatus_createdby INT(3) default NULL,
 	avstatus_createddate DATETIME default '0000-00-00 00:00:00',
  	PRIMARY KEY  (avstatus_id)
) TYPE=MyISAM;

#
# Dumping data for table 'mst_avstatus'
#

INSERT INTO mst_avstatus (avstatus_id, avstatus_desc) VALUES("1", "OPEN");
INSERT INTO mst_avstatus (avstatus_id, avstatus_desc) VALUES("2", "VERIFIED");
INSERT INTO mst_avstatus (avstatus_id, avstatus_desc) VALUES("3", "APPROVED");
INSERT INTO mst_avstatus (avstatus_id, avstatus_desc) VALUES("4", "REJECTED");

#========================================
#Table: mst_ctr_grade (contractor grades)
#========================================
DROP TABLE IF EXISTS mst_ctr_grade;
CREATE TABLE mst_ctr_grade (
	grade_id CHAR(2) NOT NULL default '0',
  	grade_desc VARCHAR(200) default NULL,
  	grade_createdby INT(3) default NULL,
 	grade_createddate DATETIME default '0000-00-00 00:00:00',
  	PRIMARY KEY  (grade_id)
) TYPE=MyISAM;

#
# Dumping data for table 'mst_ctr_grade'
#

INSERT INTO mst_ctr_grade (grade_id, grade_desc) VALUES("G1", "NOT EXCEEDING 100,000");
INSERT INTO mst_ctr_grade (grade_id, grade_desc) VALUES("G2", "NOT EXCEEDING 500,000");
INSERT INTO mst_ctr_grade (grade_id, grade_desc) VALUES("G3", "NOT EXCEEDING 1 MILLION");
INSERT INTO mst_ctr_grade (grade_id, grade_desc) VALUES("G4", "NOT EXCEEDING 3 MILLION");
INSERT INTO mst_ctr_grade (grade_id, grade_desc) VALUES("G5", "NOT EXCEEDING 5 MILLION");
INSERT INTO mst_ctr_grade (grade_id, grade_desc) VALUES("G6", "NOT EXCEEDING 10 MILLION");
INSERT INTO mst_ctr_grade (grade_id, grade_desc) VALUES("G7", "NO LIMIT");

#========================================
#Table: mst_ctr_category (contractor categories)
#========================================
DROP TABLE IF EXISTS mst_ctr_category;
CREATE TABLE mst_ctr_category (
	category_id CHAR(3) NOT NULL default '',
  	category_desc VARCHAR(100) default NULL,
  	category_desc_createdby INT(3) default NULL,
 	category_createddate DATETIME default '0000-00-00 00:00:00',
  	PRIMARY KEY (category_id)
) TYPE=MyISAM;

#
# Dumping data for table 'mst_ctr_category'
#

INSERT INTO mst_ctr_category (category_id, category_desc) VALUES("CE", "CIVIL ENGINEERING CONSTRUCTION");
INSERT INTO mst_ctr_category (category_id, category_desc) VALUES("B", "BUILDING CONSTRUCTION");
INSERT INTO mst_ctr_category (category_id, category_desc) VALUES("ME", "MECHANICAL AND ELECTRICAL");

#========================================
#Table: mst_ctr_spec (contractor specifications)
#========================================
DROP TABLE IF EXISTS mst_ctr_spec;
CREATE TABLE mst_ctr_spec (
	spec_id VARCHAR(5) NOT NULL default '0',
	spec_category_id CHAR(2) default NULL,		#[FK:mst_ctr_category]
	spec_desc VARCHAR(200) default NULL,
	spec_desc_createdby INT(3) default NULL,
 	spec_createddate DATETIME default '0000-00-00 00:00:00',
	PRIMARY KEY (spec_id)
) TYPE=MyISAM;

#
# Dumping data for table 'tbl_mst_spec'
#

INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B01", "B", "PREFABRICATED BUILDING AND INDUSTRIAL PLANT");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B02", "B", "STEEL FRAMED BUILDINGS AND INDUSTRIAL PLANT");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B03", "B", "RESTORATION AND CONSERVATION");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B04", "B", "GENERAL BUILDING AND MAINTENANCE");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B05", "B", "PILING");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B06", "B", "CONCRETE REPAIRS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B07", "B", "INTERIOR DECORATION");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B08", "B", "WATERPROOFING INSTALLATION");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B09", "B", "LANDSCAPING");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B10", "B", "PLUMBING");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B11", "B", "SIGNCRAFT INSTALLATON");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B12", "B", "ALLUMINIUM AND GLAZING WORKS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B13", "B", "TILING AND PLASTERING WORKS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B14", "B", "PAINTING");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B15", "B", "METAL ROOFING AND CLADDING");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B16", "B", "SWINNING POOL FILTRATION SYSTEM AND EQUIPMENT");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B17", "B", "PRESTRESSING AND POST TENSIONING WORKS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B18", "B", "METAL WORKS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("B19", "B", "SPECIALIZED FORMWORK SYSTEM");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE01", "CE", "ROAD AND PAVEMENT CONSTRUCTION");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE02", "CE", "BRIDGE CONSTRUCTION");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE03", "CE", "MARINE STRUCTURES");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE04", "CE", "WATER RETAINING STRUCTURES");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE05", "CE", "TUNNELING AND UNDERPINING");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE06", "CE", "IRRIGATION AND FLOOR CONTROL SYSTEM");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE07", "CE", "RAILWAY TRACKS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE08", "CE", "SLOPE PROTECTION SYSTEM");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE09", "CE", "OIL AND GAS PIPE LINES");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE10", "CE", "PILING");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE11", "CE", "CONCRETE REPAIRS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE12", "CE", "SOIL INVESTIGATION AND STABILISATION");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE13", "CE", "SIGNCRAFT INSTALLATION");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE14", "CE", "LANDSCAPING");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE15", "CE", "OFFSHORE CONSTRUCTION WORKS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE16", "CE", "UNDERWATER CONSTRUCTION WORKS AND MAINTENANCE");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE17", "CE", "AIRPORTS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE18", "CE", "RECLAMATION WORKS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE19", "CE", "SEWERAGE WORKS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE20", "CE", "WATER PIPELINES");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE21", "CE", "GENERAL CIVIL ENGINEERING");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE22", "CE", "SYNTHETIC TRACK AND PLAYING FIELDS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE23", "CE", "PRESTRESSING AND POST-TENSIONING WORKS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE24", "CE", "CIVIL ENGINEERING STRUCTURE");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE25", "CE", "ROCK BLASTING WORKS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE26", "CE", "SCULPTURED STRUCTURES");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("CE27", "CE", "THERMAL INSULATION / REFRACTORY WORKS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M01", "ME", "AIR CONDITIONNINGAND VENTILATION SYSTEM");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M02", "ME", "FIRE PREVENTION AND PROTECTION SYSTEM");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M03", "ME", "LIFTS AND ESCALATORS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M04", "ME", "BUILDING AUTOMATION SYSTEM");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M05", "ME", "WORKSHOP, MILL, QUARRY SYSTEM");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M06", "ME", "MEDICAL EQUIPMENT");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M07", "ME", "KITCHEN AND LAUNDRY EQUIPMENT");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M08", "ME", "HEAT RECOVERY SYSTEM");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M09", "ME", "COMPRESSOR AND MECHANICAL BASED GENERATOR");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M10", "ME", "CHILLER FOR POWER GENERATOR");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M11", "ME", "SPECIALLIZED FABRICATION AND TREATMENT");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M12", "ME", "SPECIALIZED PLANT");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M13", "ME", "DRILLING RIG");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M14", "ME", "POLLUTION CONTROL SYSTEM");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M15", "ME", "MISCELLANOUS MECHANICAL EQUIPMENT");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("M16", "ME", "TOWER CRANE");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("E01", "NA", "SOUND SYSTEM");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("E02", "NA", "SECURITY, SAFETY AND SURVEILLANCE SYSTEM");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("E03", "NA", "BUUILDING AUTOMATION SYSTEM AND ENERGY GENERATION SYSTEM");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("E04", "NA", "LOW VOLTAGE  INSTALLATION");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("E05", "NA", "HIGH VOLTAGE INSTALLATION");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("E06", "NA", "SPECIALIZED LIGHTING SYSTEM");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("E07", "NA", "TELECOMMUNICATION INSTALLATION");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("E08", "NA", "EXTERNAL TELECOMMUNICATION WORKS");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("E09", "NA", "MISCELLANOUS SPECIALIZED EQUIPMENT");
INSERT INTO mst_ctr_spec (spec_id, spec_category_id, spec_desc) VALUES("E10", "NA", "SPECIALIZED CONTROL PANELS");

#========================================
#Table: workers
#========================================
DROP TABLE IF EXISTS workers;
CREATE TABLE workers(
	wkr_id INT(11) NOT NULL auto_increment,
        wkr_passno VARCHAR(20) NOT NULL default '',
	wkr_name VARCHAR(250) default NULL,
	wkr_dob DATE default '0000-00-00',
	wkr_oldpassno VARCHAR(100) default NULL,
	wkr_homeaddr TEXT,
	wkr_zipcode VARCHAR(10) default NULL,
	wkr_country CHAR(3) default NULL,		#[FK: mst_countries, cty_id]
	wkr_address1 VARCHAR(100) default '',
	wkr_address2 VARCHAR(100) default '',
	wkr_address3 VARCHAR(100) default '',
	wkr_pcode VARCHAR(10) default NULL,
	wkr_state CHAR(2) default NULL,			#[FK: mst_states, state_id]
	wkr_race CHAR(3) default NULL,			#[FK: mst_race, race_id]
	wkr_gender VARCHAR(50) default NULL,		#[FK: mst_gender, gender_id]
	wkr_nationality CHAR(3) default NULL,		#[FK: mst_nationality, nat_id]
	wkr_religion CHAR(3) default NULL,		#[FK: mst_religion, rel_id]
	wkr_skill CHAR(3) default NULL,			#
  	wkr_wtrade VARCHAR(100) default NULL,		#[FK:mst_worktrade, trade_id]
  	wkr_spec VARCHAR(10) default NULL,		#[FK:]
  	wkr_experience CHAR(3) default '0',		#[FK:]
  	wkr_agent INT(3) default '0',			#[FK: mst_wkr_agent, agent_id]
	wkr_remarks TEXT,
	wkr_status CHAR(3) default '1',			#1-active, 2-inactive, 3-suspended [FK:mst_emp_status, emp_statusid]
	wkr_passexp DATE default '0000-00-00',
	wkr_plksno VARCHAR(20) default NULL,
	wkr_permitexp DATE default '0000-00-00',
	wkr_prev_permitexp DATE default '0000-00-00',
	wkr_green VARCHAR(30) default NULL,
	wkr_amnestyref VARCHAR(30) default NULL,
	wkr_entrydate DATE default '0000-00-00',
	wkr_transtatus INT(2) NOT NULL default 1,		#[FK:mst_wkr_availability, avlab_id] default 1 means registered
	wkr_intno VARCHAR(10) default NULL,			#[FK:??]
	wkr_currentemp VARCHAR(250) default '', 		#[FK:contractors, ctr_clab_no]	--this should come from assign company or local transfer
	wkr_initemp VARCHAR(250) default NULL,
	wkr_lastemp VARCHAR(250) default NULL,
	wkr_expectedemp VARCHAR(250) default NULL,
	wkr_createdby INT default NULl,
	wkr_createddate DATETIME default '0000-00-00 00:00:00',
	wkr_modifiedby INT default NULL,
	wkr_modifieddate DATETIME default '0000-00-00 00:00:00',
	PRIMARY KEY  (wkr_id)
) TYPE=MyISAM;

#========================================
#Table: wkr_statushistory
#========================================
DROP TABLE IF EXISTS wkr_statushistory;
CREATE TABLE wkr_statushistory(
        hist_wkrid INT(11) NOT NULL,
	hist_transtatus CHAR(2) default '0',
	hist_reason TEXT,
	hist_incidentdate DATE default '0000-00-00',
	hist_leavefrom DATE default '0000-00-00',
	hist_leaveto DATE default '0000-00-00',
	hist_leave_runningno VARCHAR(20),
	hist_approvedby VARCHAR(100) default '',
	hist_keyinby INT NOT NULL,
	hist_keyindate DATE default '0000-00-00'
)TYPE=MyISAM;

#==========================================
# Table structure for table 'mst_wkr_agent'
#=========================================
CREATE TABLE mst_wkr_agent (
  agent_id INT(3) NOT NULL default '0',
  agent_desc varchar(200) default NULL,
  KEY agent_id (agent_id)
) TYPE=MyISAM;

INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('1', 'PT. BINAJASA ABADIKARYA');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('2', 'PT. SAFIKA JAYA UTAMA');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('3', 'ROYAL MYANMAR');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('4', 'LOCAL TRANSFER');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('5', 'ALMA,A ENTERPRISES');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('6', 'OWN RECRUITMENT');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('7', 'PT BAGOES BERSAUDARA');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('8', 'PT SUDINAR ARTHA');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('10', 'PT KOSINDO PRADIPTA');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('11', 'WEST ASIA EXPORTS & IMPORTS LTD');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('12', 'OVERSEAS EMPLOYEMENT CORPORATION');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('13', 'PT HASTA INSAN PERKASA');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('14', 'PT SAFIKA JAYA UTAMA');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('9', 'PT GUNAMANDIRI PARIPURNA');
INSERT INTO mst_wkr_agent(agent_id, agent_desc) VALUES ('15', 'TAUFIQ MANPOWER');

#==========================================
# Table structure for table 'mst_worktrade'
#=========================================

DROP TABLE IF EXISTS mst_worktrade;
CREATE TABLE mst_worktrade (
  trade_id varchar(5) NOT NULL default '0',
  trade_desc varchar(50) default NULL,
  PRIMARY KEY  (trade_id)
) TYPE=MyISAM;


#
# Dumping data for table 'mst_worktrade'
#

INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("GW", "GENERAL WORKER");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("BB1", "BARBENDER");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("BR1", "BRICKLAYER");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("CR1", "CARPENTER-JOINERY");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("FW1", "CARPENTER-FOAM WORKS");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("CF1", "CEILING INSTALLER");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("CF2", "TILER");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("OT1", "OTHER");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("CO1", "CONCRETOR");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("PT1", "PAINTER-BUILDING");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("PL1", "PLASTERER, SKIM-COAT");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("TL1", "TILER");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("SF1", "SCAFFOLDER");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("PB1", "PLUMBER");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("X01", "EXCAVATOR");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("XH01", "SHOVEL/WHEEL LOADER");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("XR01", "ROLLER/COMPACTOR");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("XF01", "FORKLIFT");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("XD01", "DOZER");
INSERT INTO mst_worktrade(trade_id, trade_desc) VALUES("PVR", "PAVIOR");

#==========================================
# Table structure for table 'mst_skill'
#=========================================

DROP TABLE IF EXISTS mst_skill;
CREATE TABLE mst_skill (
  skill_id char(3) NOT NULL default '',
  skill_desc varchar(100) default NULL,
  PRIMARY KEY  (skill_id)
) TYPE=MyISAM;


#
# Dumping data for table 'mst_skill'
#

INSERT INTO mst_skill (skill_id, skill_desc) VALUES("G", "GENERAL");
INSERT INTO mst_skill (skill_id, skill_desc) VALUES("SS", "SEMISKILL");
INSERT INTO mst_skill (skill_id, skill_desc) VALUES("S", "SKILL");


#========================================
#Table: wkr_ctr_relationship
#========================================
DROP TABLE IF EXISTS wkr_ctr_relationship;
CREATE TABLE wkr_ctr_relationship(
        rel_wkrid INT(11) NOT NULL,		#[FK: workers, wkr_id]
        rel_ctr_clab_no VARCHAR(10) default '0',	#[FK: contractors,ctr_clab_no]
        rel_avlab_refno VARCHAR(50) default '',	#[FK: available, avlab_ref_no]
        rel_assign_type VARCHAR(50) default NULL,		#direct assign/local transfer
        rel_datehired DATE default '0000-00-00',
        rel_status INT(2) default 0,				#0-inactive, 1-active --if the worker is assigned to another company, the status will become inactive
        rel_otherinfo VARCHAR(150) default '',			#to fill in work history during registration
        rel_createdby INT(3) default NULl,
        rel_createddate DATE default '0000-00-00',
        rel_modifiedby VARCHAR(50) default NULL,
        rel_modifieddate DATE default '0000-00-00'
) ENGINE=MyISAM;

#========================================
#Table: wkr_uploaddoc
#       (a table to store uploaded documents of workers such as photos/contracts/other documents)
#========================================
DROP TABLE IF EXISTS wkr_uploaddoc;
CREATE TABLE wkr_uploaddoc (
	upload_id INT NOT NULL,
	upload_wkrid VARCHAR(20) NOT NULL,		#[FK:workers, wkr_passno]
	upload_filetype VARCHAR(20) NOT NULL,		#photos/contracts/otherdoc
	upload_otherdoc_specify VARCHAR(50) default NULL,
	upload_filesize VARCHAR(20) default NULL,
	upload_destfilename VARCHAR(100) default NULL,
	upload_filepath VARCHAR(250) default NULL,
	upload_by INT(3) default 0,
	upload_date DATE default '0000-00-00',
	PRIMARY KEY(upload_id)
) TYPE=MyISAM;

#========================================
#Table: wkr_updatepermit
#========================================
DROP TABLE IF EXISTS wkr_updatepermit;
CREATE TABLE wkr_updatepermit(
	permit_id INT NOT NULL,
        permit_wkrid VARCHAR(20) NOT NULL default '',
        permit_newplksno VARCHAR(20) default NULL,
	permit_newpermitexp DATE default '0000-00-00',
	permit_isopr char(1) default '0',
	permit_oprby VARCHAR(30) default '',
	permit_opr_date DATE default '0000-00-00',
	permit_opr_comment TEXT,
	permit_isadmin char(1) default '0',
	permit_adminby VARCHAR(30) default '',
	permit_admin_date DATE default '0000-00-00',
	permit_admin_comment TEXT,
	permit_isfromjim char(1) default '0',
	permit_fromjimby VARCHAR(30) default '',
	permit_fromjim_date DATE default '0000-00-00',
	permit_fromjim_comment TEXT,
	permit_isbackopr char(1) default '0',
	permit_backoprby VARCHAR(30) default '',
	permit_backopr_date DATE default '0000-00-00',
	permit_backopr_comment TEXT,
	permit_isincomplete CHAR(1) default '0',
	permit_incomplete_remarks TEXT,
	permit_isownsubmission CHAR(1) default '0',
	permit_progress VARCHAR(50) default '',
	PRIMARY KEY (permit_id),
	KEY (permit_wkrid)
)TYPE=MyISAM;

#========================================
#Table: worker_fresh   	[employment details of workers]
#========================================
DROP TABLE IF EXISTS worker_fresh;
CREATE TABLE worker_fresh (
  wkr_passno VARCHAR(20) default NULL,
  wkr_ktp VARCHAR(20) NOT NULL default '',
  wkr_pusat tinyint(1) default NULL,
  wkr_lastemp VARCHAR(250) default NULL,
  wkr_empexpect VARCHAR(250) default NULL,
  wkr_exemp1 VARCHAR(250) default NULL,
  wkr_ex1loc char(2) default NULL,
  wkr_exemp2 VARCHAR(250) default NULL,
  wkr_ex2loc char(2) default NULL,
  wkr_exemp3 VARCHAR(250) default NULL,
  wkr_ex3loc char(2) default NULL,
  wkr_oldpassno1 VARCHAR(10) default NULL,
  wkr_oldpassno2 VARCHAR(10) default NULL,
  wkr_oldpassno3 VARCHAR(10) default NULL,
  wkr_oldpassno4 VARCHAR(10) default NULL,
  wkr_oldpassno5 VARCHAR(10) default NULL,
  wkr_createdby VARCHAR(50) default NULL,
  wkr_createddate date default '0000-00-00'
) TYPE=MyISAM;

#========================================
#Table: wkr_history   	[employment details of workers]
#========================================
DROP TABLE IF EXISTS wkr_history;
CREATE TABLE wkr_history (
  wkrhist_no INT default '0',
  wkrhist_wkrid INT(11) NOT NULL,
  wkrhist_oldpassno varchar(50) default '0',
  wkrhist_newpassno varchar(50) default '0',
  wkrhist_setby TINYINT(4) default NULL,
  wkrhist_changedate date NOT NULL default '0000-00-00',
  wkrhist_remark varchar(50) default NULL
) TYPE=MyISAM;

#========================================
#Table: mst_gender
#========================================
DROP TABLE IF EXISTS mst_gender;
CREATE TABLE mst_gender (
  	gender_id INT(2) unsigned NOT NULL,
  	gender_desc VARCHAR(50) default NULL,
  	PRIMARY KEY  (gender_id)
) TYPE=MyISAM;

#
# Dumping data for table 'mst_gender'
#

INSERT INTO mst_gender VALUES("1", "MALE");
INSERT INTO mst_gender VALUES("2", "FEMALE");

#========================================
#Table: mst_states
#========================================
DROP TABLE IF EXISTS mst_states;
CREATE TABLE mst_states (
  	state_id INT(2) unsigned NOT NULL,
  	state_name VARCHAR(50) default NULL,
  	PRIMARY KEY  (state_id)
) TYPE=MyISAM;

#
# Dumping data for table 'mst_states'
#
INSERT INTO mst_states VALUES("1", "PERLIS");
INSERT INTO mst_states VALUES("2", "KEDAH");
INSERT INTO mst_states VALUES("3", "PULAU PINANG");
INSERT INTO mst_states VALUES("4", "PERAK");
INSERT INTO mst_states VALUES("5", "SELANGOR");
INSERT INTO mst_states VALUES("6", "MELAKA");
INSERT INTO mst_states VALUES("7", "NEGERI SEMBILAN");
INSERT INTO mst_states VALUES("8", "WP KUALA LUMPUR");
INSERT INTO mst_states VALUES("9", "JOHOR");
INSERT INTO mst_states VALUES("10", "PAHANG");
INSERT INTO mst_states VALUES("11", "TERANGGANU");
INSERT INTO mst_states VALUES("12", "KELANTAN");
INSERT INTO mst_states VALUES("13", "WP PUTRAJAYA");
INSERT INTO mst_states VALUES("14", "WP LABUAN");
INSERT INTO mst_states VALUES("15", "SABAH");
INSERT INTO mst_states VALUES("16", "SARAWAK");

#========================================
#Table: mst_countries
#========================================
DROP TABLE IF EXISTS mst_countries;
CREATE TABLE mst_countries (
        cty_id CHAR(3) NOT NULL default '',
  	cty_desc VARCHAR(200) default NULL,
  	cty_visa FLOAT(10,2) default '0.00',
  	cty_deposit FLOAT(10,0) default '0',
  	cty_createdby INT default NULL,				#current user ID (emp_id)
	cty_createddate DATETIME default '0000-00-00 00:00:00',
	cty_modifiedby INT default NULL,			#current user ID (emp_id)
	cty_modifieddate DATETIME default '0000-00-00 00:00:00',
  PRIMARY KEY  (cty_id)
) TYPE=MyISAM;

#
# Dumping data for table 'mst_countries'
#

INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("BD", "BANGLADESH", "20.00", "500");
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("CB", "CAMBODIA", "20.00", "250");
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("CN", "CHINA", "0.00", NULL);
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("IN", "INDIA", "100.00", "750");
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("ID", "INDONESIA", "15.00", "250");
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("KZ", "KAZAKHSTAN", "0.00", NULL);
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("KG", "KYRGYZSTAN", "0.00", NULL);
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("LA", "LAOS", "0.00", NULL);
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("MY", "MALAYSIA", "0.00", NULL);
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("BM", "MYANMAR", "19.50", "750");
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("NP", "NEPAL", "20.00", "750");
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("PK", "PAKISTAN", "20.00", "750");
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("RP", "PHILIPPINES", "36.00", "1000");
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("TH", "THAILAND", "0.00", "250");
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("UZ", "UZBEKISTAN", "0.00", NULL);
INSERT INTO mst_countries (cty_id, cty_desc, cty_visa, cty_deposit) VALUES("VM", "VIETNAM", "13.00", "1500");

#========================================
#Table: mst_emp_status
#========================================
DROP TABLE IF EXISTS mst_emp_status;
CREATE TABLE mst_emp_status (
        emp_statusid INT(1) unsigned NOT NULL,
  	emp_status_desc CHAR(50) default NULL,
  PRIMARY KEY  (emp_statusId)
) TYPE=MyISAM;

#
# Dumping data for table 'mst_emp_status'
#

INSERT INTO mst_emp_status VALUES("1", "ACTIVE");
INSERT INTO mst_emp_status VALUES("2", "IN-ACTIVE");
INSERT INTO mst_emp_status VALUES("3", "SUSPENDED");

#========================================
#Table: mst_wkr_availability (In Most cases, these status will be automatically set by the system)
#========================================
DROP TABLE IF EXISTS mst_wkr_availability;
CREATE TABLE mst_wkr_availability (
  	avlab_id INT(2) unsigned NOT NULL,
  	avlab_desc VARCHAR(50) default NULL,
  	PRIMARY KEY  (avlab_id)      
) TYPE=MyISAM;

#
# Dumping data for table 'mst_wkr_availability'
#
INSERT INTO mst_wkr_availability VALUES("0", "-");
INSERT INTO mst_wkr_availability VALUES("1", "REGISTERED");
INSERT INTO mst_wkr_availability VALUES("2", "ACCEPTED");
INSERT INTO mst_wkr_availability VALUES("3", "REJECTED");
INSERT INTO mst_wkr_availability VALUES("4", "AVAILABLE");
INSERT INTO mst_wkr_availability VALUES("5", "M.I.P");
INSERT INTO mst_wkr_availability VALUES("6", "BOOKED");
INSERT INTO mst_wkr_availability VALUES("7", "HIRED");
INSERT INTO mst_wkr_availability VALUES("8", "RUNAWAY");
INSERT INTO mst_wkr_availability VALUES("9", "UNKNOWN");	#in old system, this status is M.I.A
INSERT INTO mst_wkr_availability VALUES("10", "COM/DEPORTED");	#in old system, this status is Deported
INSERT INTO mst_wkr_availability VALUES("11", "DEATH");
INSERT INTO mst_wkr_availability VALUES("12", "PERMIT EXPIRED"); 	
INSERT INTO mst_wkr_availability VALUES("13", "PASSPORT EXPIRED"); 
INSERT INTO mst_wkr_availability VALUES("14", "LEAVE WITHOUT NOTICE"); 
INSERT INTO mst_wkr_availability VALUES("15", "LEAVE WITH NOTICE"); 
INSERT INTO mst_wkr_availability VALUES("16", "UNFIT"); 


#========================================
#Table: available
#	(in new system, known as Local Transfer)
#========================================
DROP TABLE IF EXISTS available;
CREATE TABLE available (
        avlab_ref_no VARCHAR(50) NOT NULL default '0',
  	avlab_submit_date DATE NOT NULL default '0000-00-00',
  	avlab_comp_from VARCHAR(10) NOT NULL default '',			#[FK:contractors, ctr_clab_no]
  	avlab_comp_to VARCHAR(10) default '',					#[FK:contractors, ctr_clab_no]
  	avlab_statusid TINYINT(2) unsigned NOT NULL default '0',		#[FK:mst_avstatus, mst_avstatus_id] 1-open, 2-verified, 3-approve, 4-rejected
  	avlab_entrystatus VARCHAR(15) default 'INCOMPLETE',			#INCOMPLETE, COMPLETE
  	avlab_entered_by VARCHAR(100) default NULL,
  	avlab_entered_date DATE NOT NULL default '0000-00-00',
  	avlab_qty INT(10) unsigned NOT NULL default '0',
  	avlab_isver CHAR(1) default NULL,					#0/1
  	avlab_ver_by VARCHAR(100) default NULL,
  	avlab_ver_date DATE default '0000-00-00',
  	avlab_isappv CHAR(1) default NULL,					#0/1
  	avlab_appv_by VARCHAR(100) default NULL,
  	avlab_appv_date DATE default '0000-00-00',
  	avlab_isrej CHAR(1) default NULL,					#0/1
  	avlab_rej_by VARCHAR(100) default NULL,
  	avlab_rej_date DATE default '0000-00-00',
  	avlab_rej_reason TEXT,
  	avlab_qty_cancel int(10) unsigned default '0',
  	avlab_cancel_remarks varchar(250) default NULL,
  	PRIMARY KEY  (avlab_ref_no)
) TYPE=MyISAM;

#========================================
#Table: available_wkr
#========================================
DROP TABLE IF EXISTS available_wkr;
CREATE TABLE available_wkr (
        avlabwkr_ref_no VARCHAR(50) NOT NULL default '',
        avlabwkr_wkrid INT (11) NOT NULL,
  	avlabwkr_status TINYINT(1) unsigned NOT NULL default '1',		#[FK:mst_wkr_availability, avlab_id] e.g., REGISTERED, AVAILABLE, MIA, DEATH, HIRED etc. 
  	avlabwkr_status_date DATE default '0000-00-00',
  	avlabwkr_avail_date DATE default '0000-00-00',
  	avlabwkr_createddate DATE default '0000-00-00',
  	avlabwkr_createdby INT(3) default 0,
  	PRIMARY KEY (avlabwkr_ref_no, avlabwkr_wkrid)
) TYPE=MyISAM;

#========================================
#Table: request
#========================================
DROP TABLE IF EXISTS request;
CREATE TABLE request (
        req_ref_no VARCHAR(50) NOT NULL default '0',
  	req_submit_date DATE NOT NULL default '0000-00-00',
  	req_ctr_clab_no VARCHAR(10) NOT NULL default '',			#[FK:contractors, ctr_clab_no]
  	req_statusid TINYINT(2) unsigned NOT NULL default '0',			#[FK:mst_avstatus, mst_avstatus_id] 1-open, 2-verified, 3-approve, 4-rejected
  	req_entered_by VARCHAR(100) NOT NULL default '',
  	req_entered_date DATE NOT NULL default '0000-00-00',
  	req_qty INT(10) unsigned NOT NULL default '0',
  	req_qty_cancel int(10) unsigned default '0',
	req_cancel_remarks varchar(250) default NULL,
  	req_isver CHAR(1) default NULL,						#0/1
  	req_ver_by VARCHAR(100) default NULL,
  	req_ver_date DATE default '0000-00-00',
  	req_isappv CHAR(1) default NULL,					#0/1
  	req_appv_by VARCHAR(100) default NULL,
  	req_appv_date DATE default '0000-00-00',
  	req_isrej CHAR(1) default NULL,						#0/1
  	req_rej_by VARCHAR(100) default NULL,
  	req_rej_date DATE default '0000-00-00',
  	req_rej_reason TEXT,
  	PRIMARY KEY  (req_ref_no)
) TYPE=MyISAM;

#========================================
#Table: request_wkr
#========================================
DROP TABLE IF EXISTS request_wkr;
CREATE TABLE request_wkr (
        reqwkr_passno VARCHAR(20) NOT NULL default '0',				#[FK:workers, wkr_passno]
  	reqwkr_req_ref_no VARCHAR(50) default NULL,				#[FK:request, req_ref_no]
  	reqwkr_avlab_ref_no VARCHAR(50) NOT NULL default '',			#[FK:available, avlab_ref_no]
  	reqwkr_status TINYINT(1) unsigned NOT NULL default '1',			#[FK:mst_wkr_availability, avlab_id] e.g., REGISTERED, AVAILABLE, MIA, DEATH, HIRED etc. 
  	reqwkr_status_date DATE default '0000-00-00',
  	reqwkr_wage_suggest FLOAT default '0',
  	reqwkr_proj_comp TINYINT(1) default '0',
  	reqwkr_pcontract_r FLOAT default '0',
  	reqwkr_wtrade_r VARCHAR(25) NOT NULL default '',
  	reqwkr_extlevi FLOAT default '0',
  	reqwkr_adminfee FLOAT default '0'
) TYPE=MyISAM;

#========================================
#Table: mst_race
#========================================
DROP TABLE IF EXISTS mst_race;
CREATE TABLE mst_race (
        race_id CHAR(3) NOT NULL default '',
  	race_desc VARCHAR(200) default NULL,
	PRIMARY KEY  (race_id) 
) TYPE=MyISAM;

#
# Dumping data for table 'mst_race'
#

INSERT INTO mst_race VALUES("TH0", "THAIS");
INSERT INTO mst_race VALUES("JW0", "JAWA");
INSERT INTO mst_race VALUES("BR0", "BREBES");
INSERT INTO mst_race VALUES("FL0", "FLOREN");
INSERT INTO mst_race VALUES("VN0", "VIETNAMESE");
INSERT INTO mst_race VALUES("OT0", "OTHERS");
INSERT INTO mst_race VALUES("BD0", "BENGALI");
INSERT INTO mst_race VALUES("LB0", "LOMBOK");
INSERT INTO mst_race VALUES("ML0", "MALANG");
INSERT INTO mst_race VALUES("GT0", "GARUT");
INSERT INTO mst_race VALUES("KD0", "KEDIRI");
INSERT INTO mst_race VALUES("GS0", "GRESIK");
INSERT INTO mst_race VALUES("PT0", "PATI");
INSERT INTO mst_race VALUES("BG0", "BANDUNG");
INSERT INTO mst_race VALUES("TB0", "TUBAN");
INSERT INTO mst_race VALUES("SR0", "SEMARANG");
INSERT INTO mst_race VALUES("NJ0", "NGANJUK");
INSERT INTO mst_race VALUES("PR0", "PONOROGO");
INSERT INTO mst_race VALUES("JP0", "JANAPRIA");
INSERT INTO mst_race VALUES("JG0", "JONGGAT");
INSERT INTO mst_race VALUES("BT0", "BLITAR");
INSERT INTO mst_race VALUES("TA0", "TULUNG AGUNG");
INSERT INTO mst_race VALUES("SK0", "SAKRA");
INSERT INTO mst_race VALUES("LTO", "LO");
INSERT INTO mst_race VALUES("BM0", "BURMESE");
INSERT INTO mst_race VALUES("PY0", "PRAYA");
INSERT INTO mst_race VALUES("LT0", "LOTENG");
INSERT INTO mst_race VALUES("BK0", "BATU KUANG");
INSERT INTO mst_race VALUES("AC0", "ACHEH");
INSERT INTO mst_race VALUES("GD0", "GANDRI");
INSERT INTO mst_race VALUES("IN0", "INDIAN");
INSERT INTO mst_race VALUES("SKO", "SASAK");

#========================================
#Table: mst_nationality
#========================================
DROP TABLE IF EXISTS mst_nationality;
CREATE TABLE  mst_nationality(
        nat_id CHAR(3) NOT NULL default '0',
  	nat_desc VARCHAR(100) default NULL,
  	PRIMARY KEY  (nat_id) 
) TYPE=MyISAM;

#
# Dumping data for table 'mst_nationality'
#

INSERT INTO mst_nationality VALUES("TH0", "THAIS");
INSERT INTO mst_nationality VALUES("IND", "INDONESIAN");
INSERT INTO mst_nationality VALUES("UZ0", "UZBEK");
INSERT INTO mst_nationality VALUES("VN0", "VIETNAMESE");
INSERT INTO mst_nationality VALUES("BD0", "BANGLADESHI");
INSERT INTO mst_nationality VALUES("BM0", "BURMESE");
INSERT INTO mst_nationality VALUES("INA", "INDIA");
INSERT INTO mst_nationality VALUES("NP0", "NEPALESE");

#========================================
#Table: mst_religion
#========================================
DROP TABLE IF EXISTS mst_religion;
CREATE TABLE mst_religion (
    	rel_id CHAR(3) NOT NULL default '0',
  	rel_desc VARCHAR(100) default NULL,
  PRIMARY KEY  (rel_id)
) TYPE=MyISAM;

#
# Dumping data for table 'mst_religion'
#

INSERT INTO mst_religion VALUES("1", "ISLAM");
INSERT INTO mst_religion VALUES("2", "BUDDHISM");
INSERT INTO mst_religion VALUES("3", "HINDUISM");
INSERT INTO mst_religion VALUES("4", "CHRISTIANITY");
INSERT INTO mst_religion VALUES("5", "OTHERS");
INSERT INTO mst_religion VALUES("6", "SIKHISM");
INSERT INTO mst_religion VALUES("7", "TAOISM");
INSERT INTO mst_religion VALUES("8", "CONFUCIANISM");
INSERT INTO mst_religion VALUES("9", "JUDAISM");
INSERT INTO mst_religion VALUES("10", "SHINTO");
INSERT INTO mst_religion VALUES("11", "JAINISM");

#========================================
#Table: workorder (SPIM)
#========================================
DROP TABLE IF EXISTS workorder;
CREATE TABLE workorder (
	wo_id INT NOT NULL,
	wo_num VARCHAR(20) NOT NULL default '',			#running number xxxx/mm/yy
	wo_date DATE default '0000-00-00',			#each document suppose to have own date field apart from keyin date
	wo_clab_no VARCHAR(10) NOT NULL default '0',		#[FK:contractors, ctr_clab_no]
	wo_fcl_total INT,
	wo_fcl_country CHAR(3) default NULL,			#[FK: mst_countries, cty_id]
	wo_agency INT(3) default NULL,			#[FK: mst_wkr_agent, agent_desc]
	wo_isreplacement CHAR(1) default '0',
	wo_replace_date DATE default '0000-00-00',
	wo_replace_reason VARCHAR(100) default NULL,
	wo_iswithdrawal CHAR(1) default '0',
	wo_withd_date DATE default '0000-00-00',
	wo_withd_reason VARCHAR(100) default NULL,
	wo_personincharge VARCHAR(50) default NULL,
	wo_keyin_by VARCHAR(50),
	wo_keyin_date DATE default '0000-00-00',
	wo_doc_rqform CHAR(1) default '0',
	wo_doc_empletter CHAR(1) default '0',
	wo_doc_awardletter CHAR(1) default '0',
	wo_doc_supplieragree CHAR(1) default '0',
	wo_doc_acco CHAR(1) default '0',
	wo_doc_signedpayment CHAR(1) default '0',
	wo_doc_datecomplete DATE default '0000-00-00',
	wo_pay_refno VARCHAR(50) default NULL,
	wo_pay_adminfee CHAR(1) default '0',
	wo_pay_levy  CHAR(1) default '0',
	wo_pay_plks  CHAR(1) default '0',
	wo_pay_agencyfee  CHAR(1) default '0',
	wo_pay_fomema  CHAR(1) default '0',
	wo_pay_visa  CHAR(1) default '0',
	wo_pay_ig  CHAR(1) default '0',
	wo_pay_fwcs  CHAR(1) default '0',
	wo_agree_receivedate DATE default '0000-00-00',		#legal agreement
	wo_isreceive CHAR(1) default '0',			#status part start
	wo_receiveby VARCHAR(20),				#login name
	wo_receivedate DATE default '0000-00-00',
	wo_receive_comment VARCHAR(100),
	wo_isprocess CHAR(1) default '0',
	wo_processby VARCHAR(20),
	wo_processdate DATE default '0000-00-00',
	wo_process_comment VARCHAR(100),
	wo_issentto_hr CHAR(1) default '0',
	wo_senthrby VARCHAR(20),
	wo_senthrdate DATE default '0000-00-00',
	wo_senthrcomment VARCHAR(100),
	wo_isreceiveby_hr CHAR(1) default '0',
	wo_receivehrby VARCHAR(20),
	wo_receivehrdate DATE default '0000-00-00',
	wo_receivehr_comment VARCHAR(100),
	wo_isjim_ack CHAR(1) default '0',
	wo_jimackby VARCHAR(20),
	wo_jimackdate DATE default '0000-00-00',
	wo_jimack_comment VARCHAR(100),
	wo_jimack_refno VARCHAR(60),
	wo_isreceive_visa CHAR(1) default '0',
	wo_receivevisaby VARCHAR(20),
	wo_receivevisadate DATE default '0000-00-00',
	wo_receivevisa_approve INT,
	wo_receivevisa_reject INT,
	wo_receivevisa_comment  VARCHAR(100),
	wo_latest_progress VARCHAR(50),					#received by Operation, processed by Operation, submit to HR, receive by HR, JIM acknowledgement, receive calling visa
	wo_modifiedby INT(3),
	wo_modifieddate DATE default '0000-00-00',
	PRIMARY KEY (wo_id)	
) TYPE=MyISAM;

#========================================
#Table: workorders (SPIM)
#========================================
DROP TABLE IF EXISTS workorders;
CREATE TABLE workorders (
	wo_id INT NOT NULL,
	wo_num VARCHAR(20) NOT NULL default '',			#running number xxxx/mm/yy (xxxx = wo_id)
	wo_date DATE default '0000-00-00',			#each document suppose to have own date field apart from keyin date
	wo_clab_no VARCHAR(10) NOT NULL default '0',		#[FK:contractors, ctr_clab_no]
	wo_contact_person VARCHAR(100) default NULL,
	wo_contact_num VARCHAR (15) default NULL,
	wo_fcl_total INT,
	wo_fcl_country CHAR(3) default NULL,			#[FK: mst_countries, cty_id]
	wo_agency INT default 1,				#[FK:wo_agency, agency_id]
	wo_isreplacement CHAR(1) default '0',
	wo_replace_date DATE default '0000-00-00',
	wo_replace_reason VARCHAR(100) default NULL,
	wo_iswithdrawal CHAR(1) default '0',
	wo_withd_date DATE default '0000-00-00',
	wo_withd_reason VARCHAR(100) default NULL,
	wo_personincharge VARCHAR(50) default NULL,
	wo_datesubmit DATE default '0000-00-00',
	wo_keyin_by VARCHAR(50),
	wo_keyin_date DATE default '0000-00-00',
	wo_modifiedby INT(3),
	wo_modifieddate DATE default '0000-00-00',
	PRIMARY KEY (wo_id)	
) TYPE=MyISAM;

#================================
# Table structure for wo_phonetrack
#================================
DROP TABLE IF EXISTS wo_phonetrack;
CREATE TABLE wo_phonetrack (
  track_id int(11) NOT NULL,
  track_wo_id int(11) default NULL,		#[FK:workorder, wo_id]
  track_datetime DATETIME default '0000-00-00 00:00:00',
  track_attendby varchar(50) default NULL,
  track_remarks varchar(50) default NULL,
  track_action varchar(150) default NULL,
  track_actionby varchar(50) default NULL,
  track_compdate DATE default '0000-00-00',
  PRIMARY KEY  (track_id)
) TYPE=MyISAM;

#===============================
# Table structure for wo_agency
#===============================
DROP TABLE IF EXISTS wo_agency;
CREATE TABLE wo_agency (
  agency_id INT(3) NOT NULL,
  agency_name varchar(100) default NULL,
  PRIMARY KEY  (agency_id)
) TYPE=MyISAM;

#
# Dumping data for table 'wo_agency'
#

INSERT INTO wo_agency(agency_id, agency_name) VALUES (1, '');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (2, 'PT SUDINAR ARTHA');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (3, 'PT GUNAMANDIRI PARIPURNA');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (4, 'PT KOSINDO PRADIPTA');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (5, 'WEST ASIA EXPORT & IMPORT Ltd');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (6, 'OVERSEAS EMPLOYMENT CORPORATION');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (7, 'PT HASTA INSAN PERKASA');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (8, 'TAUFIQ ENTERPRISE');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (9, 'PT SENDANGDAMAR SEMANGGIAGUNG');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (10, 'ARK GLOBAL PLACEMENT CONSULTANTS');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (11, 'OM K.H.S OVERSEAS PVT LTD');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (12, 'PT FICOTAMA BINA TRAMPIL');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (13, 'PT CIPTA REZEKI UTAMA');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (14, 'PT BUMI MAS ANTARNUSA');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (15, 'MAV OVERSEAS PVT LTD');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (16, 'PT BAGOES BERSAUDARA');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (17, 'PT KARYA PERSONA SUMBER REJEKI');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (18, 'SOVILACO');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (19, 'VIGLACERA');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (20, 'OWN RECRUITMENT');
INSERT INTO wo_agency(agency_id, agency_name) VALUES (21, 'LOCAL TRANSFER');

#========================================
# Table: wo_doc (SPIM)
# one-to-one relationship with table workorders
#========================================
DROP TABLE IF EXISTS wo_doc;
CREATE TABLE wo_doc (
  	doc_woid INT NOT NULL,		
  	doc_rqform CHAR(1) default '0',
  	doc_rqformdate DATE default '0000-00-00',
	doc_empletter CHAR(1) default '0',
	doc_empletterdate DATE default '0000-00-00',
	doc_awardletter CHAR(1) default '0',
	doc_awardletterdate DATE default '0000-00-00',
	doc_supplieragree CHAR(1) default '0',
	doc_supplieragreedate DATE default '0000-00-00',
	doc_acco CHAR(1) default '0',
	doc_accodate DATE default '0000-00-00',
	doc_signedpayment CHAR(1) default '0',
	doc_signedpaymentdate DATE default '0000-00-00',
	doc_datecomplete DATE default '0000-00-00',
  	PRIMARY KEY (doc_woid)
) TYPE=MyISAM;

#========================================
#Table: wo_legal (SPIM)
#========================================
DROP TABLE IF EXISTS wo_legal;
CREATE TABLE wo_legal (
	legal_woid INT NOT NULL,					#[FK:workorders, wo_id]
	legal_agree_receivedate DATE default '0000-00-00',		#legal agreement
	legal_date_ho varchar(20) default NULL,				#not sure what, copy field from OLD SPIM as it is
	PRIMARY KEY (legal_woid)	
) TYPE=MyISAM;

#========================================
#Table: wo_payment (SPIM)
#========================================
DROP TABLE IF EXISTS wo_payment;
CREATE TABLE wo_payment (
	pay_woid INT NOT NULL,
	pay_refno VARCHAR(50) default NULL,
	pay_adminfee CHAR(3) default 'NO',
	pay_levy  CHAR(3) default 'NO',
	pay_plks  CHAR(3) default 'NO',
	pay_agencyfee  CHAR(3) default 'NO',
	pay_fomema  CHAR(3) default 'NO',
	pay_visa  CHAR(3) default 'NO',
	pay_ig  CHAR(3) default 'NO',
	pay_fwcs  CHAR(3) default 'NO',
	PRIMARY KEY (pay_woid)	
) TYPE=MyISAM;

#========================================
#Table: wo_upload (SPIM)
#========================================
DROP TABLE IF EXISTS wo_upload;
CREATE TABLE wo_upload (
	upload_id INT NOT NULL,
	upload_woid INT NOT NULL,
	upload_filetype VARCHAR(30) default '',
	upload_by INT NOT NULL,
	upload_date DATE default '0000-00-00',
	upload_destfilename VARCHAR(100) default '',
	upload_path VARCHAR(200) default '',
	PRIMARY KEY (upload_id)	
) TYPE=MyISAM;

#========================================
#Table: wo_status (SPIM)
#========================================
DROP TABLE IF EXISTS wo_status;
CREATE TABLE wo_status (
	status_woid INT NOT NULL,				#[FK:workorders, wo_id]
	wo_isreceive CHAR(1) default '0',			#status part start
	wo_receiveby VARCHAR(20),				#login name
	wo_receivedate DATE default '0000-00-00',
	wo_receive_comment VARCHAR(100),
	wo_isprocess CHAR(1) default '0',
	wo_processby VARCHAR(20),
	wo_processdate DATE default '0000-00-00',
	wo_process_comment VARCHAR(100),
	wo_issentto_hr CHAR(1) default '0',
	wo_senthrby VARCHAR(20),
	wo_senthrdate DATE default '0000-00-00',
	wo_senthrcomment VARCHAR(100),
	wo_isreceiveby_hr CHAR(1) default '0',
	wo_receivehrby VARCHAR(20),
	wo_receivehrdate DATE default '0000-00-00',
	wo_receivehr_comment VARCHAR(100),
	wo_isjim_ack CHAR(1) default '0',
	wo_jimackby VARCHAR(20),
	wo_jimackdate DATE default '0000-00-00',
	wo_jimack_comment VARCHAR(100),
	wo_jimack_refno VARCHAR(60),
	wo_isreceive_visa CHAR(1) default '0',
	wo_receivevisaby VARCHAR(20),
	wo_receivevisadate DATE default '0000-00-00',
	wo_receivevisa_approve INT,
	wo_receivevisa_reject INT,
	wo_receivevisa_comment  VARCHAR(100),
	wo_latest_progress VARCHAR(50),					#received by Operation, processed by Operation, submit to HR, receive by HR, JIM acknowledgement, receive calling visa, closed
	PRIMARY KEY (status_woid)
) TYPE=MyISAM;	

#=======================employees================================
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(1, "admin123", "Administration", "ADMINISTRATOR", 5, "1211", "121", "0", "0", "1212", "0", "", "0", "9014682375", "admin", "admin");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(2, "E0010", "KHALIZA AZIZ", "DATA ENTRY", 1, "100", "03-20959599", "0123923144", "KHALIZA@CLAB.COM.MY", "20959566", "0", "", "PUSAT BANDAR DAMANSARA, KUALA LUMPUR", "01237", "liza", "liza");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(3, "E0006", "SHAARI LISUT", "OPERATION EXECUTIVE", 1, "", "03-20959599", "0127061780", "SHAARI@CLAB.COM.MY", "20959566", "", "", "PUSAT BANDAR DAMANSARA, KUALA LUMPUR", "0753214", "shaari", "shaari");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(4, "E0003", "ABD RAZAK MOHD ALI", "HEAD OF OPERATIONS", 1, "106", "03-20959599", "0192783923", "", "20959599", "", "", "PUSAT BANDAR DAMANSARA, KUALA LUMPUR", "012374", "razak", "razak");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(5, "P0002", "ROFIDAH", "OPERATION ASSISTANT", 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "01237", "rofidah", "rofidah");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(6, "E0007", "AZILAH ABDOLAH", "OPERATION ASSISTANT", 1, "112", "03-20959599", "0173143912", "ZILA@CLAB.COM.MY", "20959566", "", "", "PUSAT BANDAR DAMANSARA, KUALA LUMPUR", "7543210", "zila", "zila");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(7, "T0001", "MUHAMAD REDZUAN ABUDALLAH", "IT", 5, "119", "03-20959599", "0132306033", "redzwan@clab.com.my", "20959566", "", "", "PUSAT BANDAR DAMANSARA, KUALA LUMPUR", "012345678", "redzwan", "clab");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(8, "E0005", "FADHLINA MD. LAZIM", "SECRETARY", "", "102", "03-20959599", "0166065092", "FADHLINA@CLAB.COM.MY", "20959566", "", "", "PUSAT BANDAR DAMANSARA, KUALA LUMPUR", "014", "fad", "fad");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(9, "E0001", "CAPT AZLAN MOHD ISA", "GENERAL MANAGER", "", "101", "03-20959566", "0125584636", "AZLAN@CLAB.COM.MY", "20959566", "", "", "PUSAT BANDAR DAMANSARA, KUALA LUMPUR",  "7543210", "CAPT", "010500");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(10, "E0004", "ABD RAFIK BIN ABD RAJIS", "HEAD OF FINANCE", 2, "105", "03-20959599", "0192733501", "RAFIK@CLAB.COM.MY", "20959566", "", "", "PUSAT BANDAR DAMANSARA, KUALA LUMPUR", "34", "RAFIK", "RAFIK");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(11, "E0008", "NORAINI BTE ARIF SHAH", "OPERATION ASSISTANT", 1, "109", "20959599", "0125701180", "NORAINI@CLAB.COM.MY", "20959566", "", "", "PUSAT BANDAR DAMANSARA, KUALA LUMPUR", "1023457", "noraini", "noraini");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(13, "E0011", "NORMAH BT TALIB", "IT", 5, "116", "03-20959599", "0132547924", "normah@clab.com.my", "20959566", "", "", "PUSAT BANDAR DAMANSARA, KUALA LUMPUR", "01234678", "normah", "normah");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(14, "E0002", "MOHD ROZAINI AB. RAHMAN", "HEAD OF DEPARTMENT", 3, "103", "03-20959599", "0162163233", "rozaini@clab.com.my", "20959566", "", "", "PUSAT BANDAR DAMANSARA, KUALA LUMPUR", "01234", "rozaini", "rozaini");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(15, "E0009", "MOHD KHAIRI ABDULLAH", "OA", 1, "120", "03-20959599", "0129108125", "KHAIRI@CLAB.COM.MY", "20959566", "", "", "PUSAT BANDAR DAMANSARA, KUALA LUMPUR", "012347", "khairi", "khairi");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(16, "P0001", "NATALIA", "IT", 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "01237", "natalia", "natalia");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(17, "E0012", "MARDZIYAH MOHD SAZILI", "FINANCE", "", "114", "03-20959599", "0126613573", "MARDY@CLAB.COM.MY", "20959566", "", "", "PUSAT BANDAR DAMANSARA, KUALA LUMPUR", "0123457", "mardy", "mardy");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(18, "E0013", "HAFIZAL", "OPERATION ASSISTANT", 1, "", "", "", "hafizal@clab.com.my", "", "", "", "", "012347", "hafizal", "hafizal");
INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_address, emp_office_location, emp_accessibility, emp_username, emp_password) VALUES(19, "E0014", "FAIZAL", "HR EXECUTIVE", 3, "", "", "", "faizal@clab.com.my", "", "", "", "", "01234", "faizal", "faizal");

